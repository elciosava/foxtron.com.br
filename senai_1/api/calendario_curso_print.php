<?php
require '../conexao/conexao.php';

$curso_id = $_GET['curso_id'] ?? null;

if (!$curso_id) {
    die("Curso não informado.");
}

// =============================
// 1. Buscar dados do curso
// =============================
$sql = "SELECT * FROM cursos WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->execute([':id' => $curso_id]);
$curso = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$curso) {
    die("Curso não encontrado.");
}

// =============================
// 2. Buscar aulas + UC + professor
// =============================
$sql = "SELECT 
            a.*,
            u.sigla,
            u.nome AS nome_uc,
            u.cor,
            p.nome AS nome_prof
        FROM aulas a
        JOIN unidades_curriculares u ON a.uc_id = u.id
        JOIN professores p ON a.professor_id = p.id
        WHERE a.curso_id = :curso
        ORDER BY a.data ASC";

$stmt = $conexao->prepare($sql);
$stmt->execute([':curso' => $curso_id]);
$aulas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Indexar aulas por data
$aulasPorData = [];
$professoresDoCurso = [];

foreach ($aulas as $aula) {
    $data = $aula['data']; // Y-m-d

    if (!isset($aulasPorData[$data])) {
        $aulasPorData[$data] = [];
    }
    $aulasPorData[$data][] = $aula;

    // Lista de professores
    $nomeProf = $aula['nome_prof'];
    if (!isset($professoresDoCurso[$nomeProf])) {
        $professoresDoCurso[$nomeProf] = [];
    }
    $siglaUc = $aula['sigla'] ?: $aula['nome_uc'];
    if (!in_array($siglaUc, $professoresDoCurso[$nomeProf])) {
        $professoresDoCurso[$nomeProf][] = $siglaUc;
    }
}

// =============================
// 2.1 Feriados (opcional para impressão)
// =============================
$sqlF = "SELECT data, tipo, descricao FROM feriados";
$stmtF = $conexao->query($sqlF);
$feriados = $stmtF->fetchAll(PDO::FETCH_ASSOC);

$feriadosPorData = [];
foreach ($feriados as $f) {
    $feriadosPorData[$f['data']] = $f;
}

// =============================
// 3. Intervalo de meses
// =============================
$dataInicio = new DateTime($curso['data_inicio']);
$dataFim    = new DateTime($curso['data_fim']);
$dataFim->modify('last day of this month');

function nomeMesPt($mesNumero) {
    $nomes = [
        1 => 'Janeiro',
        2 => 'Fevereiro',
        3 => 'Março',
        4 => 'Abril',
        5 => 'Maio',
        6 => 'Junho',
        7 => 'Julho',
        8 => 'Agosto',
        9 => 'Setembro',
        10 => 'Outubro',
        11 => 'Novembro',
        12 => 'Dezembro'
    ];
    return $nomes[(int)$mesNumero] ?? $mesNumero;
}

$cursorMes = new DateTime($curso['data_inicio']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calendário - Impressão - <?= htmlspecialchars($curso['nome']) ?></title>
    <style>
        /* Layout pensado para A4 em modo paisagem ou retrato */

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background:#ffffff;
            color:#000;
            margin:0;
            padding:10px;
        }

        .topo {
            text-align:center;
            margin-bottom:10px;
        }

        .topo h1 {
            margin:0;
            font-size:18px;
        }

        .topo p {
            margin:2px 0;
            font-size:12px;
        }

        .professores {
            margin-top:6px;
            font-size:11px;
        }

        .professores strong {
            font-size:12px;
        }

        .prof-item {
            margin-bottom:2px;
        }

        .uc-tag {
            display:inline-block;
            border:1px solid #000;
            padding:0 4px;
            margin-right:3px;
            font-size:10px;
        }

        .calendarios {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 meses por linha */
            gap: 8px;
            margin-top:10px;
        }

        .calendario-mes {
            border:1px solid #000;
            padding:4px;
            page-break-inside: avoid;
        }

        .calendario-mes h3 {
            text-align:center;
            margin:2px 0 4px 0;
            font-size:12px;
        }

        table {
            width:100%;
            border-collapse:collapse;
            font-size:9px;
        }

        th, td {
            border:1px solid #000;
            padding:2px;
            vertical-align:top;
            height:40px;
        }

        th {
            text-align:center;
            background:#eee;
        }

        .dia-numero {
            font-weight:bold;
            font-size:9px;
        }

        .evento {
            margin-top:1px;
            font-size:8px;
        }

        .evento small {
            display:block;
            font-size:7px;
        }

        .evento-feriado {
            margin-top:1px;
            font-size:8px;
            font-weight:bold;
        }

        .cel-fora-curso {
            background:#fdfdfd;
            color:#999;
        }

        .legend {
            margin-top:8px;
            font-size:9px;
        }

        .legend-item {
            display:inline-block;
            margin-right:8px;
            margin-bottom:3px;
        }

        .legend-color {
            display:inline-block;
            width:10px;
            height:10px;
            border:1px solid #000;
            margin-right:3px;
        }

        .acoes {
            text-align:right;
            margin-bottom:5px;
        }

        .btn-print {
            display:inline-block;
            padding:4px 8px;
            font-size:11px;
            border:1px solid #000;
            background:#f5f5f5;
            cursor:pointer;
        }

        /* Ao imprimir, esconde botão de ações */
        @media print {
            .acoes {
                display:none;
            }
            body {
                margin:5mm;
            }
        }
    </style>
</head>
<body>

<div class="acoes">
    <button class="btn-print" onclick="window.print()">Imprimir / Salvar em PDF</button>
</div>

<div class="topo">
    <h1>Calendário de Curso - <?= htmlspecialchars($curso['nome']) ?></h1>
    <p><strong>Período:</strong>
        <?= date('d/m/Y', strtotime($curso['data_inicio'])) ?>
        a
        <?= date('d/m/Y', strtotime($curso['data_fim'])) ?>
    </p>
    <p><strong>Turno:</strong> <?= htmlspecialchars($curso['turno']) ?> |
       <strong>Carga horária:</strong> <?= (int)$curso['carga_horaria_total'] ?>h</p>

    <div class="professores">
        <strong>Professores:</strong><br>
        <?php if (empty($professoresDoCurso)): ?>
            <span>Sem aulas cadastradas.</span>
        <?php else: ?>
            <?php foreach ($professoresDoCurso as $prof => $ucsProf): ?>
                <div class="prof-item">
                    <?= htmlspecialchars($prof) ?>:
                    <?php foreach ($ucsProf as $sigla): ?>
                        <span class="uc-tag"><?= htmlspecialchars($sigla) ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<div class="calendarios">
<?php
if (empty($aulas)) {
    echo "<p><strong>Nenhuma aula encontrada para este curso.</strong></p>";
} else {

    while ($cursorMes <= $dataFim) {
        $ano  = (int)$cursorMes->format('Y');
        $mes  = (int)$cursorMes->format('m');

        $primeiroDoMes = new DateTime("$ano-$mes-01");
        $ultimoDoMes   = new DateTime("$ano-$mes-01");
        $ultimoDoMes->modify('last day of this month');

        if ($ultimoDoMes < new DateTime($curso['data_inicio'])) {
            $cursorMes->modify('first day of next month');
            continue;
        }
        if ($primeiroDoMes > new DateTime($curso['data_fim'])) {
            break;
        }

        echo '<div class="calendario-mes">';
        echo '<h3>' . nomeMesPt($mes) . ' / ' . $ano . '</h3>';
        echo '<table>';
        echo '<tr>
                <th>SEG</th>
                <th>TER</th>
                <th>QUA</th>
                <th>QUI</th>
                <th>SEX</th>
                <th>SAB</th>
                <th>DOM</th>
              </tr>';

        $primeiroDiaSemana = (int)$primeiroDoMes->format('N'); // 1=Seg, 7=Dom
        $diasNoMes = (int)$primeiroDoMes->format('t');

        $dia = 1;
        $celula = 1;

        echo '<tr>';

        // Espaços antes do primeiro dia
        for ($i = 1; $i < $primeiroDiaSemana; $i++) {
            echo '<td></td>';
            $celula++;
        }

        // Dias do mês
        while ($dia <= $diasNoMes) {
            $dataStr = sprintf('%04d-%02d-%02d', $ano, $mes, $dia);

            $estaNoPeriodo = (
                $dataStr >= $curso['data_inicio'] &&
                $dataStr <= $curso['data_fim']
            );
            $ehFeriado = isset($feriadosPorData[$dataStr]);

            $classesTd = [];
            if (!$estaNoPeriodo) {
                $classesTd[] = 'cel-fora-curso';
            }

            echo '<td class="'. implode(' ', $classesTd) .'">';
            echo '<div class="dia-numero">' . $dia . '</div>';

            // Feriado
            if ($ehFeriado) {
                $infoF = $feriadosPorData[$dataStr];
                $rotulo = $infoF['tipo'] == 'FERIADO' ? 'Feriado' : $infoF['tipo'];
                echo '<div class="evento-feriado">'
                    . htmlspecialchars($rotulo)
                    . '<br><small>' . htmlspecialchars($infoF['descricao']) . '</small>'
                    . '</div>';
            }

            // Aulas
            if (isset($aulasPorData[$dataStr])) {
                foreach ($aulasPorData[$dataStr] as $aulaDia) {
                    $siglaUc = $aulaDia['sigla'] ?: $aulaDia['nome_uc'];
                    $prof    = $aulaDia['nome_prof'];
                    $horaIni = substr($aulaDia['hora_inicio'], 0, 5);
                    $horaFim = substr($aulaDia['hora_fim'], 0, 5);

                    echo '<div class="evento">';
                    echo htmlspecialchars($siglaUc) . ' (' . $horaIni . '–' . $horaFim . ')';
                    echo '<small>' . htmlspecialchars($prof) . '</small>';
                    echo '</div>';
                }
            }

            echo '</td>';

            if ($celula % 7 == 0) {
                echo '</tr>';
                if ($dia < $diasNoMes) {
                    echo '<tr>';
                }
            }

            $dia++;
            $celula++;
        }

        // Completar linha final, se sobrar colunas
        if (($celula - 1) % 7 != 0) {
            $resto = 7 - (($celula - 1) % 7);
            for ($i = 0; $i < $resto; $i++) {
                echo '<td></td>';
            }
            echo '</tr>';
        }

        echo '</table>';
        echo '</div>'; // .calendario-mes

        $cursorMes->modify('first day of next month');
    }
}
?>
</div>

<div class="legend">
    <strong>Legenda:</strong>
    <?php
    $coresPorUc = [];
    foreach ($aulas as $aula) {
        $siglaUc = $aula['sigla'] ?: $aula['nome_uc'];
        $corUc   = $aula['cor'] ?: '#ffffff';
        $coresPorUc[$siglaUc] = $corUc;
    }
    foreach ($coresPorUc as $sigla => $cor): ?>
        <span class="legend-item">
            <span class="legend-color" style="background:<?= htmlspecialchars($cor) ?>;"></span>
            <?= htmlspecialchars($sigla) ?>
        </span>
    <?php endforeach; ?>
</div>

</body>
</html>
