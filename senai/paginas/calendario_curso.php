<?php
// paginas/calendario_curso.php
require '../conexao/conexao.php';

$curso_id = filter_input(INPUT_GET, 'curso_id', FILTER_VALIDATE_INT);

if (!$curso_id) {
    die("Curso inválido.");
}

// Buscar curso
$sqlCurso = "SELECT * FROM cursos WHERE id = :id";
$stmtCurso = $conexao->prepare($sqlCurso);
$stmtCurso->execute([':id' => $curso_id]);
$curso = $stmtCurso->fetch(PDO::FETCH_ASSOC);

if (!$curso) {
    die("Curso não encontrado.");
}

// Buscar AULAS desse curso (com UC, professor e COR da UC)
$sqlAulas = "SELECT a.*,
                    u.sigla,
                    u.nome AS nome_uc,
                    u.cor AS cor_uc,
                    p.nome AS nome_prof
             FROM aulas a
             JOIN unidades_curriculares u ON a.uc_id = u.id
             LEFT JOIN professores p ON a.professor_id = p.id
             WHERE a.curso_id = :curso
             ORDER BY a.data ASC, a.hora_inicio ASC";
$stmtAulas = $conexao->prepare($sqlAulas);
$stmtAulas->execute([':curso' => $curso_id]);
$aulas = $stmtAulas->fetchAll(PDO::FETCH_ASSOC);

// Organizar aulas por data e coletar UCs (com cor) para legenda
$aulasPorData = [];
$ucs = []; // ['SIGLA OU NOME' => ['cor' => '#xxxxxx']]

foreach ($aulas as $aula) {
    $data = $aula['data']; // formato YYYY-MM-DD
    if (!isset($aulasPorData[$data])) {
        $aulasPorData[$data] = [];
    }
    $aulasPorData[$data][] = $aula;

    $rotuloUC = $aula['sigla'] ?: $aula['nome_uc'];

    // pega cor da UC
    $cor = trim($aula['cor_uc'] ?? '');
    if ($cor === '') {
        $cor = '#1f77b4'; // padrão se não tiver cor no banco
    } else {
        // garante que tenha #
        if ($cor[0] !== '#') {
            $cor = '#' . $cor;
        }
    }

    if (!isset($ucs[$rotuloUC])) {
        $ucs[$rotuloUC] = ['cor' => $cor];
    }
}

function nomeMesPt($numMes)
{
    $meses = [
        1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
        5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
        9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
    ];
    return $meses[$numMes] ?? '';
}

// Intervalo de meses do curso
$inicioCurso = new DateTime($curso['data_inicio']);
$fimCurso    = new DateTime($curso['data_fim']);

$inicioMes = new DateTime($inicioCurso->format('Y-m-01'));
$fimMes    = new DateTime($fimCurso->format('Y-m-t'));

$meses = [];
$cursor = clone $inicioMes;
while ($cursor <= $fimMes) {
    $meses[] = [
        'ano' => (int)$cursor->format('Y'),
        'mes' => (int)$cursor->format('n')
    ];
    $cursor->modify('+1 month');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calendário do curso - <?= htmlspecialchars($curso['nome']) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background:#f3f6fc;
            margin:0;
        }
        header {
            background:#1a2041;
            color:#fff;
            padding:15px 20px;
        }
        header h1{margin:0; font-size:20px;}
        .container {
            max-width: 1200px;
            margin:20px auto;
            background:#fff;
            padding:20px 25px 25px;
            border-radius:8px;
            box-shadow:0 0 10px rgba(0,0,0,.1);
        }
        h2{margin-top:0; color:#1a2041;}
        .info-curso {
            font-size:14px;
            line-height:1.5;
            margin-bottom:15px;
        }
        .info-curso strong { color:#1a2041; }

        .botoes-topo {
            margin-bottom: 15px;
        }
        .botoes-topo a.btn {
            display:inline-block;
            margin-right:5px;
            padding:6px 10px;
            text-decoration:none;
            background:#1a2041;
            color:#fff;
            border-radius:6px;
            font-size:13px;
        }

        .meses-container {
            display:flex;
            flex-wrap:wrap;
            gap:20px;
            margin-top:10px;
        }
        .mes-bloco {
            flex:1 1 300px;
            min-width:280px;
            border:1px solid #ccc;
            border-radius:6px;
            overflow:hidden;
        }
        .mes-titulo {
            background:#ffd900;
            text-align:center;
            font-weight:bold;
            padding:4px 0;
            border-bottom:1px solid #ccc;
        }
        .mes-titulo span.ano {
            font-size:12px;
            font-weight:normal;
        }
        table.mes-tabela {
            width:100%;
            border-collapse: collapse;
            font-size:11px;
        }
        table.mes-tabela th,
        table.mes-tabela td {
            border:1px solid #ddd;
            padding:2px;
            text-align:center;
            vertical-align:top;
            height:32px;
        }
        table.mes-tabela th {
            background:#f0f0ff;
            font-weight:bold;
        }
        table.mes-tabela td.vazio {
            background:#f9f9f9;
        }
        .dia-numero {
            font-size:10px;
            text-align:right;
        }
        .uc-badge {
            margin-top:3px;
            padding:2px 3px;
            border-radius:3px;
            font-size:9px;
            font-weight:bold;
            color:#fff;
        }

        .legenda {
            margin-top:20px;
            font-size:12px;
        }
        .legenda h3 {
            margin:0 0 5px 0;
            font-size:13px;
            color:#1a2041;
        }
        .legenda-item {
            display:flex;
            align-items:center;
            gap:5px;
            margin-bottom:3px;
        }
        .legenda-cor {
            width:14px;
            height:14px;
            border-radius:3px;
            border:1px solid #999;
        }
    </style>
</head>
<body>
<header>
    <h1>Calendário do Curso</h1>
</header>

<div class="container">
    <h2><?= htmlspecialchars($curso['nome']) ?></h2>
    <div class="info-curso">
        <div>
            <strong>Cód. curso:</strong> <?= htmlspecialchars($curso['cod_curso'] ?? '') ?>
            <?php if (!empty($curso['cod_turma'])): ?>
                | <strong>Turma:</strong> <?= htmlspecialchars($curso['cod_turma']) ?>
            <?php endif; ?>
            <?php if (!empty($curso['cod_matriz'])): ?>
                | <strong>Matriz:</strong> <?= htmlspecialchars($curso['cod_matriz']) ?>
            <?php endif; ?>
        </div>
        <div>
            <strong>Data inicial:</strong>
            <?= date('d/m/Y', strtotime($curso['data_inicio'])) ?>
            &nbsp;&nbsp;
            <strong>Data final:</strong>
            <?= date('d/m/Y', strtotime($curso['data_fim'])) ?>
        </div>
        <div>
            <strong>Turno:</strong> <?= htmlspecialchars($curso['turno']) ?>
            | <strong>Período letivo:</strong> <?= (int)$curso['ano_letivo'] ?>
            | <strong>CH total:</strong> <?= (int)$curso['carga_horaria_total'] ?>h
        </div>
        <div>
            <strong>Dias de aula:</strong> <?= htmlspecialchars($curso['dias_aula']) ?>
        </div>
    </div>

    <div class="botoes-topo">
        <a href="../index.php" class="btn">Voltar para lista de cursos</a>
        <a href="cursos.php" class="btn">Gerenciar cursos</a>
        <a href="../api/gerar_agendamentos.php?curso_id=<?= $curso_id ?>" class="btn">Regerar calendário</a>
        <a href="ver_aulas.php?curso_id=<?= $curso_id ?>" class="btn">Ver aulas em lista</a>
    </div>

    <?php if (empty($aulas)): ?>
        <div class="legenda">
            Nenhuma aula encontrada para este curso.<br>
            Gere o calendário / aulas primeiro.
        </div>
    <?php else: ?>
        <div class="meses-container">
            <?php foreach ($meses as $infoMes): ?>
                <?php
                $ano = $infoMes['ano'];
                $mes = $infoMes['mes'];

                $primeiroDia = new DateTime(sprintf('%04d-%02d-01', $ano, $mes));
                $diasNoMes   = (int)$primeiroDia->format('t');
                $indicePrimeiro = (int)$primeiroDia->format('w'); // 0=Dom ... 6=Sab
                ?>
                <div class="mes-bloco">
                    <div class="mes-titulo">
                        <?= nomeMesPt($mes) ?>
                        <span class="ano"><?= $ano ?></span>
                    </div>
                    <table class="mes-tabela">
                        <tr>
                            <th>DOM</th>
                            <th>SEG</th>
                            <th>TER</th>
                            <th>QUA</th>
                            <th>QUI</th>
                            <th>SEX</th>
                            <th>SÁB</th>
                        </tr>
                        <?php
                        $diaAtual = 1;
                        $posicao = 0;

                        while ($diaAtual <= $diasNoMes) {
                            echo "<tr>";
                            for ($col = 0; $col < 7; $col++) {
                                if ($posicao < $indicePrimeiro || $diaAtual > $diasNoMes) {
                                    echo '<td class="vazio"></td>';
                                } else {
                                    $dataYmd = sprintf('%04d-%02d-%02d', $ano, $mes, $diaAtual);
                                    echo '<td>';
                                    echo '<div class="dia-numero">' . $diaAtual . '</div>';

                                    if (isset($aulasPorData[$dataYmd])) {
                                        foreach ($aulasPorData[$dataYmd] as $aulaDia) {
                                            $rotuloUC = $aulaDia['sigla'] ?: $aulaDia['nome_uc'];

                                            // cor vinda do banco
                                            $cor = trim($aulaDia['cor_uc'] ?? '');
                                            if ($cor === '') {
                                                $cor = '#1f77b4';
                                            } else {
                                                if ($cor[0] !== '#') {
                                                    $cor = '#' . $cor;
                                                }
                                            }

                                            echo '<div class="uc-badge" style="background:' . htmlspecialchars($cor) . ';">'
                                                . htmlspecialchars($rotuloUC)
                                                . '</div>';
                                        }
                                    }

                                    echo '</td>';
                                    $diaAtual++;
                                }
                                $posicao++;
                            }
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($ucs)): ?>
            <div class="legenda">
                <h3>Unidades Curriculares / Cores</h3>
                <?php foreach ($ucs as $ucNome => $info): ?>
                    <?php
                        $cor = $info['cor'] ?? '#1f77b4';
                    ?>
                    <div class="legenda-item">
                        <div class="legenda-cor" style="background: <?= htmlspecialchars($cor) ?>;"></div>
                        <span><?= htmlspecialchars($ucNome) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
</body>
</html>
