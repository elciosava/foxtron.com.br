<?php
require '../conexao/conexao.php';
require '../conexao/aprendizagem.php';

garantirEstruturaAprendizagem($conexao);

$sqlCursos = "SELECT id, nome, cod_curso, cod_turma, turno, ano_letivo, data_inicio, data_fim, eh_turma_base
              , perfil_aprendizagem
              FROM cursos
              WHERE (tipo = 'Aprendizagem' OR UPPER(modalidade) = 'APRENDIZAGEM' OR UPPER(cod_curso) LIKE 'APR-%')
                AND COALESCE(fase_aprendizagem, '') <> 'ENTRADA'
              ORDER BY eh_turma_base DESC, ano_letivo DESC, nome ASC";
$cursos = $conexao->query($sqlCursos)->fetchAll(PDO::FETCH_ASSOC);
$feriados = $conexao->query("SELECT data FROM feriados")->fetchAll(PDO::FETCH_COLUMN);
$professores = $conexao->query("SELECT id, nome, apelido FROM professores ORDER BY nome")->fetchAll(PDO::FETCH_ASSOC);

$msg = '';
$msgTipo = 'erro';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cursoBaseId = (int)($_POST['curso_base_id'] ?? 0);
    $nome = trim($_POST['nome'] ?? '');
    $codTurma = trim($_POST['cod_turma'] ?? '');
    $dataInicio = $_POST['data_inicio'] ?? '';
    $horasDia = (float)($_POST['horas_por_dia'] ?? 4);
    $profEntrada = [
        'FCI' => (int)($_POST['professor_FCI'] ?? 0),
        'RCE' => (int)($_POST['professor_RCE'] ?? 0),
        'SST' => (int)($_POST['professor_SST'] ?? 0),
    ];

    if (!$cursoBaseId || $nome === '' || $dataInicio === '' || $horasDia <= 0 || in_array(0, $profEntrada, true)) {
        $msg = 'Preencha curso base, nome, data de início, horas por dia e os professores das 3 UCs de entrada.';
    } else {
        $stmtBase = $conexao->prepare("SELECT * FROM cursos WHERE id = :id");
        $stmtBase->execute([':id' => $cursoBaseId]);
        $cursoBase = $stmtBase->fetch(PDO::FETCH_ASSOC);

        if (!$cursoBase || !cursoEhAprendizagem($cursoBase)) {
            $msg = 'A turma-base selecionada não é uma turma de Aprendizagem válida.';
        } else {
            $ucsObrigatorias = buscarUcsEntradaObrigatorias($conexao, $cursoBaseId);
            $faltantes = [];
            foreach ($ucsObrigatorias as $chave => $uc) {
                if (!$uc) $faltantes[] = $chave;
            }

            if ($faltantes) {
                $msg = 'A turma-base não possui todas as UCs obrigatórias do módulo de entrada. Faltando: ' . implode(', ', $faltantes) . '.';
            } else {
                try {
                    $cargaTotal = array_sum(array_map(fn($uc) => (float)$uc['carga_horaria'], $ucsObrigatorias));
                    $dataFimModulo = calcularFimModuloEntrada($dataInicio, $cargaTotal, $horasDia, $feriados);
                    $ucDestino = localizarProximaUcTurmaBase($conexao, $cursoBaseId, $dataFimModulo);
                    $dataIntegracao = $ucDestino['data_inicio_uc'] ?? null;
                    $ucIntegracaoId = isset($ucDestino['uc_id']) ? (int)$ucDestino['uc_id'] : null;

                    $conexao->beginTransaction();

                    // Garante que a turma escolhida passe a ser reconhecida como turma-base.
                    $conexao->prepare("UPDATE cursos SET tipo = 'Aprendizagem', eh_turma_base = 1 WHERE id = :id")
                        ->execute([':id' => $cursoBaseId]);

                    $sqlInsCurso = "INSERT INTO cursos
                        (nome, cod_curso, cod_turma, cod_matriz, carga_horaria_total,
                         data_inicio, data_fim, turno, ano_letivo, horas_por_dia, dias_aula,
                         modalidade, eh_turma_base, tipo, perfil_aprendizagem, curso_base_id, fase_aprendizagem,
                         data_integracao, uc_integracao_id)
                        VALUES
                        (:nome, :cod_curso, :cod_turma, :cod_matriz, :carga,
                         :inicio, :fim, :turno, :ano, :horas_dia, 'SEG,TER,QUA,QUI,SEX',
                         'APRENDIZAGEM', 0, 'Aprendizagem', :perfil_aprendizagem, :curso_base_id, 'ENTRADA',
                         :data_integracao, :uc_integracao_id)";
                    $stmtIns = $conexao->prepare($sqlInsCurso);
                    $stmtIns->execute([
                        ':nome' => $nome,
                        ':cod_curso' => $cursoBase['cod_curso'],
                        ':cod_turma' => $codTurma,
                        ':cod_matriz' => $cursoBase['cod_matriz'] ?? null,
                        ':carga' => $cargaTotal,
                        ':inicio' => $dataInicio,
                        ':fim' => $dataFimModulo,
                        ':turno' => $cursoBase['turno'],
                        ':ano' => (int)$cursoBase['ano_letivo'],
                        ':horas_dia' => $horasDia,
                        ':perfil_aprendizagem' => $cursoBase['perfil_aprendizagem'] ?: ((str_contains(strtoupper((string)$cursoBase['cod_curso']), 'ADM')) ? 'ADM' : 'PROD'),
                        ':curso_base_id' => $cursoBaseId,
                        ':data_integracao' => $dataIntegracao,
                        ':uc_integracao_id' => $ucIntegracaoId,
                    ]);

                    $novoCursoId = (int)$conexao->lastInsertId();
                    $stmtInsUC = $conexao->prepare("INSERT INTO unidades_curriculares
                        (curso_id, sigla, nome, carga_horaria, cor, professor_id, ordem, ch_max_ava)
                        VALUES (:curso_id, :sigla, :nome, :carga, :cor, :professor_id, :ordem, 0)");

                    $ordem = 1;
                    foreach (['FCI', 'RCE', 'SST'] as $chave) {
                        $uc = $ucsObrigatorias[$chave];
                        $stmtInsUC->execute([
                            ':curso_id' => $novoCursoId,
                            ':sigla' => $uc['sigla'],
                            ':nome' => $uc['nome'],
                            ':carga' => $uc['carga_horaria'],
                            ':cor' => $uc['cor'],
                            ':professor_id' => $profEntrada[$chave],
                            ':ordem' => $ordem++,
                        ]);
                    }

                    $conexao->commit();
                    header('Location: ../api/gerar_agendamentos.php?curso_id=' . $novoCursoId);
                    exit;
                } catch (Throwable $e) {
                    if ($conexao->inTransaction()) $conexao->rollBack();
                    $msg = 'Erro ao criar módulo de entrada: ' . $e->getMessage();
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Módulo de Entrada - Aprendizagem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f6fc;
            margin: 0;
            color: #20243a
        }

        header {
            background: #1a2041;
            color: #fff;
            padding: 15px 20px
        }

        header h1 {
            margin: 0;
            font-size: 20px
        }

        .container {
            max-width: 920px;
            margin: 20px auto;
            background: #fff;
            padding: 22px 26px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1)
        }

        form label {
            display: block;
            font-weight: bold;
            margin-top: 12px;
            font-size: 13px
        }

        form input,
        form select {
            width: 100%;
            padding: 9px;
            margin-top: 4px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 13px;
            box-sizing: border-box
        }

        .linha {
            display: flex;
            gap: 12px;
            align-items: flex-end;
        }

        .linha>div {
            flex: 1
        }

        button,
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 9px 14px;
            background: #1a2041;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px
        }

        .msg {
            margin: 12px 0;
            padding: 10px;
            background: #fff2f2;
            border: 1px solid #e8b2b2;
            border-radius: 6px;
            color: #a00000;
            font-size: 13px
        }

        .info {
            margin: 14px 0;
            padding: 12px;
            background: #f4f7ff;
            border-left: 4px solid #1a2041;
            font-size: 13px;
            line-height: 1.55
        }

        .ok {
            color: #176b31
        }

        .warn {
            color: #9a6300
        }

        small {
            font-size: 11px;
            color: #555
        }

        #resumo_calculo {
            display: block;
            margin-top: 10px;
            font-size: 13px;
            line-height: 1.5
        }
    </style>
</head>

<body>
    <header>
        <h1>Módulo de Entrada - Aprendizagem</h1>
    </header>
    <div class="container">
        <a href="../index.php" class="btn">Voltar</a>
        <a href="cursos.php" class="btn">Gerenciar cursos</a>
        <a href="matrizes_aprendizagem.php" class="btn">Matrizes</a>

        <div class="info">
            <strong>Regra V2:</strong> a turma de entrada faz somente as 3 UCs obrigatórias (FCI, Relações Sócio Profissionais/Cidadania e Ética e SST), de segunda a sexta. Depois vai para a empresa até a próxima UC completa da turma principal. A integração ocorre no primeiro dia dessa UC.
        </div>

        <?php if ($msg): ?><div class="msg"><?= htmlspecialchars($msg) ?></div><?php endif; ?>

        <form method="post">
            <label>Turma principal (turma-base)</label>
            <select name="curso_base_id" id="curso_base_id" required>
                <option value="">Selecione...</option>
                <?php foreach ($cursos as $c): ?>
                    <option value="<?= (int)$c['id'] ?>" data-nome="<?= htmlspecialchars($c['nome']) ?>">
                        <?= htmlspecialchars($c['nome']) ?> — <?= htmlspecialchars($c['cod_curso'] ?? '') ?>
                        <?= $c['eh_turma_base'] ? ' [BASE]' : '' ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Nome da turma de entrada</label>
            <input type="text" name="nome" id="nome" required placeholder="Ex.: Entrada - Aprendizagem Assistente Administrativo">

            <div class="linha">
                <div><label>Código da nova turma</label><input type="text" name="cod_turma" placeholder="Ex.: APR-ENT-2026-03"></div>
                <div><label>Horas por dia</label><input type="number" step="0.25" min="0.25" name="horas_por_dia" id="horas_por_dia" value="4" required></div>
                <div><label>Data de início</label><input type="date" name="data_inicio" id="data_inicio" required></div>
            </div>
            <div class="info" style="margin-top:18px">
                <strong>Professores das 3 semanas de entrada</strong><br>
                Como a matriz padrão não depende de professores fixos, escolha quem ministrará cada UC nesta nova turma.
            </div>
            <div class="linha">
                <?php foreach (['FCI' => 'FCI — Fundamentos da Comunicação e Informação', 'RCE' => 'RCE/RSP — Relações Sócio Profissionais, Cidadania e Ética', 'SST' => 'SST — Saúde e Segurança do Trabalho'] as $chave => $rotulo): ?>
                    <div>
                        <label><?= htmlspecialchars($rotulo) ?></label>
                        <select name="professor_<?= $chave ?>" required>
                            <option value="">Selecione...</option>
                            <?php foreach ($professores as $p): ?>
                                <option value="<?= (int)$p['id'] ?>"><?= htmlspecialchars($p['nome'] . (!empty($p['apelido']) ? ' (' . $p['apelido'] . ')' : '')) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="button" onclick="calcularIntegracao()">Pré-visualizar integração</button>
            <span id="resumo_calculo"></span>
            <br>
            <button type="submit">Criar módulo de entrada e gerar calendário</button>
        </form>
    </div>
    <script>
        document.getElementById('curso_base_id').addEventListener('change', function() {
            const opt = this.options[this.selectedIndex];
            if (opt && opt.dataset.nome && !document.getElementById('nome').value) {
                document.getElementById('nome').value = 'Entrada - ' + opt.dataset.nome;
            }
        });

        async function calcularIntegracao() {
            const resumo = document.getElementById('resumo_calculo');
            const cursoBaseId = parseInt(document.getElementById('curso_base_id').value || '0', 10);
            const inicio = document.getElementById('data_inicio').value;
            const horas = parseFloat(document.getElementById('horas_por_dia').value || '4');
            if (!cursoBaseId || !inicio) {
                resumo.textContent = 'Selecione a turma principal e a data de início.';
                return;
            }
            resumo.textContent = 'Calculando...';
            try {
                const resp = await fetch('../api/sincronizar_entrada.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        curso_base_id: cursoBaseId,
                        data_inicio: inicio,
                        horas_por_dia: horas
                    })
                });
                const j = await resp.json();
                if (j.status !== 'ok') {
                    resumo.innerHTML = '<span class="warn">' + (j.mensagem || 'Não foi possível calcular.') + '</span>';
                    return;
                }
                const br = s => s ? s.split('-').reverse().join('/') : '';
                let txt = '<span class="ok">Módulo de entrada termina em <strong>' + br(j.data_fim_teorica) + '</strong>.</span> ';
                if (j.data_integracao) {
                    txt += 'Depois, a turma fica na empresa até <strong>' + br(j.data_integracao) + '</strong>, quando entra na UC <strong>' + ((j.uc_sigla ? j.uc_sigla + ' - ' : '') + (j.uc_nome || '')) + '</strong> da turma principal.';
                } else {
                    txt += '<span class="warn">A turma principal ainda não tem uma próxima UC disponível no calendário. Gere/revise o calendário da turma principal antes de finalizar a integração.</span>';
                }
                resumo.innerHTML = txt;
            } catch (e) {
                resumo.textContent = 'Falha na comunicação com o servidor.';
            }
        }
    </script>
</body>

</html>