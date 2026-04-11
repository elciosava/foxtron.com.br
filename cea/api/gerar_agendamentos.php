<?php
// ../api/gerar_agendamentos.php
require '../conexao/conexao.php';

$curso_id = filter_input(INPUT_GET, 'curso_id', FILTER_VALIDATE_INT);
if (!$curso_id)
    die("Curso inválido.");

try {
    // ==============================
    // 0. BUSCA CURSO
    // ==============================
    $stmt = $conexao->prepare("SELECT * FROM cursos WHERE id = :id");
    $stmt->execute([':id' => $curso_id]);
    $curso = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$curso)
        die("Curso não encontrado.");

    // ==============================
    // 1. FERIADOS / FÉRIAS
    // ==============================
    $feriados = $conexao->query("SELECT data FROM feriados")
        ->fetchAll(PDO::FETCH_COLUMN); // ['YYYY-MM-DD', ...]

    // ==============================
    // 2. PARAMETROS DO CURSO
    // ==============================
    $cargaTotal = (float) ($curso['carga_horaria_total'] ?? 0);
    $horasDia = (float) ($curso['horas_por_dia'] ?? 0);
    $dataInicioStr = $curso['data_inicio'] ?? '';
    $turno = $curso['turno'] ?? 'Vespertino';
    $tipoCurso = $curso['tipo'] ?? 'Tecnico';
    $codCurso = strtoupper(trim($curso['cod_curso'] ?? ''));

    if ($cargaTotal <= 0 || $horasDia <= 0 || empty($dataInicioStr)) {
        die("Dados insuficientes para gerar agendamentos.");
    }

    // ==============================
    // 3. HORÁRIOS PADRÃO POR TURNO
    // ==============================
    switch ($turno) {
        case 'Matutino':
            $horaInicioStr = '08:00:00';
            break;
        case 'Vespertino':
            $horaInicioStr = '13:30:00';
            break;
        case 'Noturno':
        default:
            $horaInicioStr = '18:30:00';
            break;
    }

    $horaInicio = new DateTime($horaInicioStr);
    $horaFim = clone $horaInicio;
    $horaFim->modify('+' . $horasDia . ' hour');
    $horaFimStr = $horaFim->format('H:i:s');

    // ==============================
    // 4. MAPA DIAS SEMANA
    // ==============================
    $mapaDiaSemana = [
        0 => 'DOM',
        1 => 'SEG',
        2 => 'TER',
        3 => 'QUA',
        4 => 'QUI',
        5 => 'SEX',
        6 => 'SAB'
    ];

    function ehFimDeSemana(DateTime $d)
    {
        $w = (int) $d->format('w'); // 0 dom, 6 sáb
        return ($w === 0 || $w === 6);
    }


    // ====================================================
    // 5. REGRA ESPECIAL DA APRENDIZAGEM (ADM / PRO)
    // ====================================================
    $diasEscola = null;     // quais dias tem aula na escola
    $diaInicioUC = null;    // dia fixo que sempre inicia UC (SEG ou QUA)

    if ($tipoCurso === 'Aprendizagem') {
        if (str_contains($codCurso, 'APR-ADM-TRILHA')) {
            $diasEscola = ['SEG', 'TER'];
            $diaInicioUC = 'SEG';
        } elseif (str_contains($codCurso, 'APR-PRO-TRILHA')) {
            $diasEscola = ['QUA', 'QUI', 'SEX'];
            $diaInicioUC = 'QUA';
        } else {
            die("Curso Aprendizagem sem cod_curso reconhecido. Use APR-ADM-TRILHA ou APR-PRO-TRILHA.");
        }
    } else {
        // cursos normais seguem dias_aula do cadastro
        $diasAulaStr = strtoupper($curso['dias_aula'] ?? '');
        $diasEscola = array_filter(array_map('trim', explode(',', $diasAulaStr)));
        if (empty($diasEscola))
            die("Dias de aula inválidos.");
    }

    // ====================================================
    // 6. BUSCA UCs DO CURSO
    // ====================================================
    $stmtUC = $conexao->prepare("
        SELECT id, sigla, nome, carga_horaria, professor_id, cor
        FROM unidades_curriculares
        WHERE curso_id = :curso_id
        ORDER BY id
    ");
    $stmtUC->execute([':curso_id' => $curso_id]);
    $ucs = $stmtUC->fetchAll(PDO::FETCH_ASSOC);

    // ====================================================
    // 6.1 SE FOR APRENDIZAGEM E NÃO TIVER UCs, COPIA DO TEMPLATE
    // ====================================================
    if ($tipoCurso === 'Aprendizagem' && empty($ucs)) {
        $stmtTpl = $conexao->prepare("
            SELECT id FROM cursos
            WHERE cod_curso = :cod
              AND tipo = 'Aprendizagem'
              AND id <> :id
            ORDER BY id ASC
            LIMIT 1
        ");
        $stmtTpl->execute([':cod' => $curso['cod_curso'], ':id' => $curso_id]);
        $tplId = (int) $stmtTpl->fetchColumn();

        if ($tplId) {
            $stmtTplUC = $conexao->prepare("
                SELECT sigla, nome, carga_horaria, cor, professor_id
                FROM unidades_curriculares
                WHERE curso_id = :tpl
                ORDER BY id
            ");
            $stmtTplUC->execute([':tpl' => $tplId]);
            $tplUCs = $stmtTplUC->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($tplUCs)) {
                $sqlInsUC = "
                    INSERT INTO unidades_curriculares
                    (curso_id, sigla, nome, carga_horaria, cor, professor_id)
                    VALUES
                    (:curso_id, :sigla, :nome, :ch, :cor, :prof)
                ";
                $stmtInsUC = $conexao->prepare($sqlInsUC);

                foreach ($tplUCs as $ucT) {
                    $stmtInsUC->execute([
                        ':curso_id' => $curso_id,
                        ':sigla' => $ucT['sigla'],
                        ':nome' => $ucT['nome'],
                        ':ch' => $ucT['carga_horaria'],
                        ':cor' => $ucT['cor'],
                        ':prof' => $ucT['professor_id']
                    ]);
                }

                // recarrega UCs
                $stmtUC->execute([':curso_id' => $curso_id]);
                $ucs = $stmtUC->fetchAll(PDO::FETCH_ASSOC);
            }
        }

        if (empty($ucs)) {
            die("Este curso de Aprendizagem não tem UCs, e não foi encontrado curso template para copiar.");
        }
    }

    // ====================================================
    // 7. BLOQUEIO: UC SEM PROFESSOR
    // ====================================================
    $ucsSemProfessor = [];
    foreach ($ucs as $uc) {
        if (empty($uc['professor_id'])) {
            $rotulo = trim(($uc['sigla'] ?? '') . ' - ' . ($uc['nome'] ?? ''));
            $ucsSemProfessor[] = $rotulo;
        }
    }
    if (!empty($ucsSemProfessor)) {
        die(
            "Erro: existem Unidades Curriculares sem professor definido:\n" .
            implode("\n", $ucsSemProfessor) .
            "\n\nVá em 'Gerenciar UCs' e defina o professor antes de gerar o calendário."
        );
    }

    // ====================================================
    // 8. LÓGICA DE GERAÇÃO
    // ====================================================
    $conexao->beginTransaction();

    // limpa anterior
    $conexao->prepare("DELETE FROM agendamentos WHERE curso_id = :id")->execute([':id' => $curso_id]);
    $conexao->prepare("DELETE FROM aulas WHERE curso_id = :id")->execute([':id' => $curso_id]);

    $sqlInsAula = "
        INSERT INTO aulas
        (curso_id, data, hora_inicio, hora_fim, uc_id, professor_id, modalidade)
        VALUES
        (:curso_id, :data, :ini, :fim, :uc_id, :prof_id, :modalidade)
    ";
    $stmtInsAula = $conexao->prepare($sqlInsAula);

    // para agendamentos (só dias escola)
    $sqlInsAg = "
        INSERT INTO agendamentos (curso_id, data_aula, hora_inicio, hora_fim)
        VALUES (:curso_id, :data, :ini, :fim)
    ";
    $stmtInsAg = $conexao->prepare($sqlInsAg);

    $dataCursor = new DateTime($dataInicioStr);

    // Ajusta início da primeira UC para o dia correto (SEG ou QUA) no caso Aprendizagem
    if ($tipoCurso === 'Aprendizagem') {
        while ($mapaDiaSemana[(int) $dataCursor->format('w')] !== $diaInicioUC) {
            $dataCursor->modify('+1 day');
        }
    }

    foreach ($ucs as $uc) {
        $chUC = (float) $uc['carga_horaria'];
        $diasUC = (int) ceil($chUC / $horasDia);

        $diasAulaFeitos = 0;

        // ============================
        // 8.1 EXECUTA DIAS DA UC
        // ============================
        while ($diasAulaFeitos < $diasUC) {

            $diaSemana = $mapaDiaSemana[(int) $dataCursor->format('w')];
            $dataYmd = $dataCursor->format('Y-m-d');
            $ehFeriado = in_array($dataYmd, $feriados, true);

            // ✅ pula sábado/domingo SEM registrar nada
            if ($tipoCurso === 'Aprendizagem' && ehFimDeSemana($dataCursor)) {
                $dataCursor->modify('+1 day');
                continue;
            }

            if ($ehFeriado) {
                // feriado não vira aula e nem IND
                $dataCursor->modify('+1 day');
                continue;
            }

            if (in_array($diaSemana, $diasEscola, true)) {
                // DIA DE ESCOLA → PRESENCIAL

                $stmtInsAula->execute([
                    ':curso_id' => $curso_id,
                    ':data' => $dataYmd,
                    ':ini' => $horaInicioStr,
                    ':fim' => $horaFimStr,
                    ':uc_id' => $uc['id'],
                    ':prof_id' => $uc['professor_id'],
                    ':modalidade' => 'PRESENCIAL'
                ]);

                $stmtInsAg->execute([
                    ':curso_id' => $curso_id,
                    ':data' => $dataYmd,
                    ':ini' => $horaInicioStr,
                    ':fim' => $horaFimStr
                ]);

                $diasAulaFeitos++;

            } else {
                // DIA DE INDÚSTRIA → IND (sem professor)
                if ($tipoCurso === 'Aprendizagem') {
                    $stmtInsAula->execute([
                        ':curso_id' => $curso_id,
                        ':data' => $dataYmd,
                        ':ini' => $horaInicioStr,
                        ':fim' => $horaFimStr,
                        ':uc_id' => $uc['id'],
                        ':prof_id' => $uc['professor_id'], // pode ficar o mesmo, mas agenda filtra IND
                        ':modalidade' => 'IND'
                    ]);
                }
            }

            $dataCursor->modify('+1 day');
        }

        // ============================
        // 8.2 APURAÇÃO → 7 DIAS IND
        // ============================
        if ($tipoCurso === 'Aprendizagem') {
            for ($k = 0; $k < 7; $k++) {

                if (ehFimDeSemana($dataCursor)) {
                    $dataCursor->modify('+1 day');
                    continue;
                }

                $dataYmd = $dataCursor->format('Y-m-d');
                $ehFeriado = in_array($dataYmd, $feriados, true);

                if (!$ehFeriado) {
                    $stmtInsAula->execute([
                        ':curso_id' => $curso_id,
                        ':data' => $dataYmd,
                        ':ini' => $horaInicioStr,
                        ':fim' => $horaFimStr,
                        ':uc_id' => $uc['id'],
                        ':prof_id' => $uc['professor_id'],
                        ':modalidade' => 'IND'
                    ]);
                }

                $dataCursor->modify('+1 day');

            }

            // Próxima UC sempre reinicia no dia fixo do curso (SEG ou QUA)
            // Depois da apuração, até chegar na SEG/QUA de reinício,
            // os alunos continuam na indústria (dias úteis).
            while ($mapaDiaSemana[(int) $dataCursor->format('w')] !== $diaInicioUC) {

                // pula fim de semana
                if (ehFimDeSemana($dataCursor)) {
                    $dataCursor->modify('+1 day');
                    continue;
                }

                $dataYmd = $dataCursor->format('Y-m-d');
                $ehFeriado = in_array($dataYmd, $feriados, true);

                if (!$ehFeriado) {
                    $stmtInsAula->execute([
                        ':curso_id' => $curso_id,
                        ':data' => $dataYmd,
                        ':ini' => $horaInicioStr,
                        ':fim' => $horaFimStr,
                        ':uc_id' => $uc['id'],
                        ':prof_id' => $uc['professor_id'],
                        ':modalidade' => 'IND'
                    ]);
                }

                $dataCursor->modify('+1 day');
            }

        }
    }

    // Atualiza data_fim pelo último dia gerado (última aula)
    $ultimaData = $conexao->query("SELECT MAX(data) FROM aulas WHERE curso_id = " . (int) $curso_id)->fetchColumn();

    if ($ultimaData) {
        $conexao->prepare("UPDATE cursos SET data_fim = :fim WHERE id = :id")
            ->execute([':fim' => $ultimaData, ':id' => $curso_id]);
    }

    $conexao->commit();

    header("Location: ../paginas/calendario_curso.php?curso_id=" . $curso_id);
    exit;

} catch (PDOException $e) {
    if ($conexao->inTransaction())
        $conexao->rollBack();
    die("Erro ao gerar agendamentos: " . $e->getMessage());
}
