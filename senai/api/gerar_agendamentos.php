<?php
require '../conexao/conexao.php';
require '../conexao/utilidades.php';
require '../conexao/aprendizagem.php';

$cursoId = filter_input(INPUT_GET, 'curso_id', FILTER_VALIDATE_INT);
if (!$cursoId) die('Curso inválido.');

try {
    garantirEstruturaAprendizagem($conexao);

    $stmt = $conexao->prepare('SELECT * FROM cursos WHERE id = :id');
    $stmt->execute([':id' => $cursoId]);
    $curso = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$curso) throw new RuntimeException('Curso não encontrado.');

    $feriados = $conexao->query('SELECT data FROM feriados')->fetchAll(PDO::FETCH_COLUMN);
    $excecoes = [];
    try {
        $stmtExc = $conexao->prepare("SELECT data FROM excecoes_calendario WHERE curso_id = :curso_id AND tipo = 'RECESSO'");
        $stmtExc->execute([':curso_id' => $cursoId]);
        $excecoes = $stmtExc->fetchAll(PDO::FETCH_COLUMN);
    } catch (Throwable $e) {
        // Compatibilidade com bases antigas sem a tabela de exceções.
    }
    $datasBloqueadas = array_values(array_unique(array_merge($feriados, $excecoes)));

    $horasDia = (float)($curso['horas_por_dia'] ?? 0);
    $dataInicioStr = (string)($curso['data_inicio'] ?? '');
    $turno = (string)($curso['turno'] ?? 'Vespertino');
    if ($horasDia <= 0 || $dataInicioStr === '') throw new RuntimeException('Dados insuficientes para gerar o calendário.');

    $horaInicioStr = match ($turno) {
        'Matutino' => '08:00:00',
        'Vespertino' => '13:30:00',
        default => '18:30:00',
    };
    $minutosDia = (int)round($horasDia * 60);
    $horaInicio = new DateTime($horaInicioStr);
    $horaFim = clone $horaInicio;
    $horaFim->modify('+' . $minutosDia . ' minutes');
    $horaFimStr = $horaFim->format('H:i:s');

    $mapaDiaSemana = mapaDiasSemana();
    $ehAprendizagem = cursoEhAprendizagem($curso);
    $ehEntrada = cursoEhEntradaAprendizagem($curso);
    $diaInicioUC = null;

    if ($ehEntrada) {
        // Módulo de entrada: três semanas intensivas, SEG a SEX.
        $diasEscola = ['SEG', 'TER', 'QUA', 'QUI', 'SEX'];
    } elseif ($ehAprendizagem) {
        $perfilCod = strtoupper(trim((string)($curso['perfil_aprendizagem'] ?? '')));
        $perfil = $perfilCod === 'ADM' ? ['perfil'=>'ADM','dias_escola'=>['SEG','TER'],'dia_inicio_uc'=>'SEG']
            : ($perfilCod === 'PROD' ? ['perfil'=>'PRODUCAO','dias_escola'=>['QUA','QUI','SEX'],'dia_inicio_uc'=>'QUA']
            : perfilAprendizagem((string)($curso['cod_curso'] ?? '')));
        if (!$perfil) {
            throw new RuntimeException('Código de Aprendizagem não reconhecido. Use um código APR-ADM... ou APR-PROD/APR-PRO....');
        }
        $diasEscola = $perfil['dias_escola'];
        $diaInicioUC = $perfil['dia_inicio_uc'];
    } else {
        $diasEscola = array_values(array_filter(array_map('trim', explode(',', strtoupper((string)($curso['dias_aula'] ?? ''))))));
        if (!$diasEscola) throw new RuntimeException('Dias de aula inválidos.');
    }

    $stmtUC = $conexao->prepare("SELECT id, sigla, nome, carga_horaria, professor_id, cor, ordem
                                 FROM unidades_curriculares
                                 WHERE curso_id = :curso_id
                                 ORDER BY COALESCE(ordem, 999999), id");
    $stmtUC->execute([':curso_id' => $cursoId]);
    $ucs = $stmtUC->fetchAll(PDO::FETCH_ASSOC);

    if (!$ucs) throw new RuntimeException('Este curso não possui Unidades Curriculares cadastradas.');

    // Turmas de entrada devem conter EXATAMENTE as três UCs obrigatórias.
    if ($ehEntrada) {
        $ucsObrigatorias = buscarUcsEntradaObrigatorias($conexao, $cursoId);
        $faltantes = array_keys(array_filter($ucsObrigatorias, fn($uc) => !$uc));
        if ($faltantes) throw new RuntimeException('Módulo de entrada incompleto. Faltando: ' . implode(', ', $faltantes) . '.');
        $ucs = [$ucsObrigatorias['FCI'], $ucsObrigatorias['RCE'], $ucsObrigatorias['SST']];
    }

    $semProfessor = [];
    foreach ($ucs as $uc) {
        if (empty($uc['professor_id'])) $semProfessor[] = trim(($uc['sigla'] ?? '') . ' - ' . ($uc['nome'] ?? ''));
    }
    if ($semProfessor) {
        throw new RuntimeException("Existem UCs sem professor definido:\n" . implode("\n", $semProfessor) . "\nDefina os professores antes de gerar o calendário.");
    }

    // Recalcula a integração da turma de entrada contra o calendário atual da turma-base.
    $dataIntegracao = null;
    $ucIntegracaoId = null;
    if ($ehEntrada && !empty($curso['curso_base_id'])) {
        $cargaEntrada = array_sum(array_map(fn($uc) => (float)$uc['carga_horaria'], $ucs));
        $fimModulo = calcularFimModuloEntrada($dataInicioStr, $cargaEntrada, $horasDia, $datasBloqueadas);
        $destino = localizarProximaUcTurmaBase($conexao, (int)$curso['curso_base_id'], $fimModulo);
        if ($destino) {
            $dataIntegracao = $destino['data_inicio_uc'];
            $ucIntegracaoId = (int)$destino['uc_id'];
        }
        $conexao->prepare('UPDATE cursos SET data_integracao = :data, uc_integracao_id = :uc WHERE id = :id')
            ->execute([':data' => $dataIntegracao, ':uc' => $ucIntegracaoId, ':id' => $cursoId]);
    }

    $conexao->beginTransaction();
    $conexao->prepare('DELETE FROM agendamentos WHERE curso_id = :id')->execute([':id' => $cursoId]);
    $conexao->prepare('DELETE FROM aulas WHERE curso_id = :id')->execute([':id' => $cursoId]);

    $stmtInsAula = $conexao->prepare("INSERT INTO aulas
        (curso_id, data, hora_inicio, hora_fim, uc_id, professor_id, modalidade)
        VALUES (:curso_id, :data, :ini, :fim, :uc_id, :prof_id, :modalidade)");
    $stmtInsAg = $conexao->prepare("INSERT INTO agendamentos (curso_id, data_aula, hora_inicio, hora_fim)
                                    VALUES (:curso_id, :data, :ini, :fim)");

    $dataCursor = new DateTime($dataInicioStr);
    if ($ehAprendizagem && !$ehEntrada && $diaInicioUC) {
        while ($mapaDiaSemana[(int)$dataCursor->format('w')] !== $diaInicioUC) $dataCursor->modify('+1 day');
    }

    $ultimaUcId = null;
    foreach ($ucs as $uc) {
        $ultimaUcId = (int)$uc['id'];
        $horasRestantes = (float)$uc['carga_horaria'];

        while ($horasRestantes > 0.0001) {
            $diaSemana = $mapaDiaSemana[(int)$dataCursor->format('w')];
            $dataYmd = $dataCursor->format('Y-m-d');

            if (ehFimDeSemanaAprendizagem($dataCursor) && $ehAprendizagem) {
                $dataCursor->modify('+1 day');
                continue;
            }
            if (in_array($dataYmd, $datasBloqueadas, true)) {
                $dataCursor->modify('+1 day');
                continue;
            }

            if (in_array($diaSemana, $diasEscola, true)) {
                $disp = verificarDisponibilidadeProfessor((int)$uc['professor_id'], $dataYmd, $horaInicioStr, $horaFimStr, $conexao);
                if (!$disp['disponivel']) {
                    throw new RuntimeException('Conflito em ' . date('d/m/Y', strtotime($dataYmd)) . ': ' . $disp['conflito']);
                }

                $stmtInsAula->execute([
                    ':curso_id' => $cursoId, ':data' => $dataYmd, ':ini' => $horaInicioStr, ':fim' => $horaFimStr,
                    ':uc_id' => $uc['id'], ':prof_id' => $uc['professor_id'], ':modalidade' => 'PRESENCIAL'
                ]);
                $stmtInsAg->execute([':curso_id' => $cursoId, ':data' => $dataYmd, ':ini' => $horaInicioStr, ':fim' => $horaFimStr]);
                $horasRestantes -= min($horasDia, $horasRestantes);
            } elseif ($ehAprendizagem && !$ehEntrada) {
                // Na turma regular, os demais dias úteis são fase empresa.
                $stmtInsAula->execute([
                    ':curso_id' => $cursoId, ':data' => $dataYmd, ':ini' => $horaInicioStr, ':fim' => $horaFimStr,
                    ':uc_id' => $uc['id'], ':prof_id' => null, ':modalidade' => 'IND'
                ]);
            }
            $dataCursor->modify('+1 day');
        }

        // Regra já existente da turma regular: uma semana de empresa/apuração antes da próxima UC.
        // A turma de ENTRADA não recebe esta pausa entre FCI/RCE/SST: são 3 semanas contínuas.
        if ($ehAprendizagem && !$ehEntrada) {
            $fimApuracao = (clone $dataCursor)->modify('+7 days');
            while ($dataCursor < $fimApuracao) {
                $dataYmd = $dataCursor->format('Y-m-d');
                if (!ehFimDeSemanaAprendizagem($dataCursor) && !in_array($dataYmd, $datasBloqueadas, true)) {
                    $stmtInsAula->execute([
                        ':curso_id' => $cursoId, ':data' => $dataYmd, ':ini' => $horaInicioStr, ':fim' => $horaFimStr,
                        ':uc_id' => $uc['id'], ':prof_id' => null, ':modalidade' => 'IND'
                    ]);
                }
                $dataCursor->modify('+1 day');
            }

            while ($mapaDiaSemana[(int)$dataCursor->format('w')] !== $diaInicioUC) {
                $dataYmd = $dataCursor->format('Y-m-d');
                if (!ehFimDeSemanaAprendizagem($dataCursor) && !in_array($dataYmd, $datasBloqueadas, true)) {
                    $stmtInsAula->execute([
                        ':curso_id' => $cursoId, ':data' => $dataYmd, ':ini' => $horaInicioStr, ':fim' => $horaFimStr,
                        ':uc_id' => $uc['id'], ':prof_id' => null, ':modalidade' => 'IND'
                    ]);
                }
                $dataCursor->modify('+1 day');
            }
        }
    }

    // Depois das três UCs de entrada, registra fase empresa até a véspera da integração.
    if ($ehEntrada && $dataIntegracao && $ultimaUcId) {
        $limite = new DateTime($dataIntegracao);
        while ($dataCursor < $limite) {
            $dataYmd = $dataCursor->format('Y-m-d');
            if (!ehFimDeSemanaAprendizagem($dataCursor) && !in_array($dataYmd, $datasBloqueadas, true)) {
                $stmtInsAula->execute([
                    ':curso_id' => $cursoId, ':data' => $dataYmd, ':ini' => $horaInicioStr, ':fim' => $horaFimStr,
                    ':uc_id' => $ultimaUcId, ':prof_id' => null, ':modalidade' => 'IND'
                ]);
            }
            $dataCursor->modify('+1 day');
        }
    }

    $stmtUltima = $conexao->prepare('SELECT MAX(data) FROM aulas WHERE curso_id = :id');
    $stmtUltima->execute([':id' => $cursoId]);
    $ultimaData = $stmtUltima->fetchColumn();
    if ($ultimaData) {
        $conexao->prepare('UPDATE cursos SET data_fim = :fim WHERE id = :id')->execute([':fim' => $ultimaData, ':id' => $cursoId]);
    }

    $conexao->commit();
    header('Location: ../paginas/calendario_curso.php?curso_id=' . $cursoId);
    exit;
} catch (Throwable $e) {
    if (isset($conexao) && $conexao->inTransaction()) $conexao->rollBack();
    $mensagem = addslashes($e->getMessage());
    echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Erro</title></head><body>";
    echo "<script>alert('ERRO AO GERAR CALENDÁRIO:\\n\\n{$mensagem}'); window.history.back();</script>";
    echo '</body></html>';
    exit;
}
