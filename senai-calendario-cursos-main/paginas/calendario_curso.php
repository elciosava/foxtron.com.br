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

    // Montar lista de professores do curso
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
// 2.1 Buscar feriados (para colorir no calendário)
// =============================
$sqlF = "SELECT data, tipo, descricao FROM feriados";
$stmtF = $conexao->query($sqlF);
$feriados = $stmtF->fetchAll(PDO::FETCH_ASSOC);

$feriadosPorData = [];
foreach ($feriados as $f) {
    $feriadosPorData[$f['data']] = $f; // indexa por Y-m-d
}

// =============================
// 3. Calcular intervalo de meses
// =============================
$dataInicio = new DateTime($curso['data_inicio']);
$dataFim = new DateTime($curso['data_fim']);

// Garantir que pega o mês inteiro no fim
$dataFim->modify('last day of this month');

// Função helper para nomes dos meses em PT-BR
function nomeMesPt($mesNumero)
{
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
    return $nomes[(int) $mesNumero] ?? $mesNumero;
}

// Clonar datas para loop de meses
$cursorMes = new DateTime($curso['data_inicio']);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Calendário - <?= htmlspecialchars($curso['nome']) ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f6fc;
            margin: 0;
        }

        header {
            background: #1a2041;
            color: #fff;
            padding: 15px 20px;
        }

        header h1 {
            margin: 0;
            font-size: 20px;
        }

        .container {
            max-width: 1500px;
            /* MAIS LARGO */
            margin: 20px auto 40px auto;
            padding: 0 15px;
        }

        .curso-info {
            background: #fff;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
            font-size: 14px;
        }

        .curso-info h2 {
            margin-top: 0;
            font-size: 18px;
            color: #1a2041;
        }

        .prof-list {
            margin: 10px 0 0 0;
            padding: 0;
            list-style: none;
        }

        .prof-list li {
            margin-bottom: 4px;
        }

        .tag-uc {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 11px;
            margin-right: 4px;
            color: #fff;
        }

        .calendarios {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* SEMPRE 3 MESES POR LINHA */
            gap: 20px;
        }

        .calendario-mes {
            background: #fff;
            padding: 10px 12px 15px 12px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.08);
            width: 100%;
            /* grid cuida da largura */
            min-height: 260px;
            /* só pra ficar equilibrado */
        }


        .calendario-mes h3 {
            text-align: center;
            margin: 5px 0 10px 0;
            font-size: 16px;
            color: #1a2041;
        }

        .calendario-mes table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
            table-layout: fixed;
            /* linhas/colunas com tamanho fixo */
        }

        .calendario-mes th,
        .calendario-mes td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: left;
            vertical-align: top;
            height: 70px;
            /* TODAS as células com mesma altura */
            box-sizing: border-box;
            overflow: hidden;
            /* conteúdo não estica a célula */
        }

        .calendario-mes th {
            background: #f0f0ff;
            text-align: center;
        }

        .dia-numero {
            font-weight: bold;
            font-size: 11px;
            margin-bottom: 2px;
            display: block;
        }

        .evento,
        .evento-feriado {
            font-size: 10px;
            border-radius: 4px;
            padding: 2px 3px;
            margin-top: 2px;
            color: #fff;
        }

        .evento small {
            display: block;
            font-size: 9px;
        }


        .dia-numero {
            font-weight: bold;
            font-size: 11px;
            margin-bottom: 2px;
        }

        .evento {
            font-size: 10px;
            border-radius: 4px;
            padding: 2px 3px;
            margin-top: 2px;
            color: #fff;
        }

        .evento small {
            display: block;
            font-size: 9px;
        }

        .legend {
            margin-top: 20px;
            background: #fff;
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.08);
            font-size: 12px;
        }

        .legend-item {
            display: inline-flex;
            align-items: center;
            margin-right: 10px;
            margin-bottom: 5px;
        }

        .legend-color {
            width: 14px;
            height: 14px;
            border-radius: 4px;
            margin-right: 5px;
            border: 1px solid #ccc;
        }

        a.btn {
            display: inline-block;
            margin: 10px 10px 20px 0;
            padding: 8px 12px;
            background: #1a2041;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .calendario-mes {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 600px) {
            .calendario-mes {
                width: 100%;
            }
        }

        .cel-feriado {
            background: #ffe5e5 !important;
        }

        .cel-fora-curso {
            background: #f9f9f9;
            color: #bbb;
        }

        .evento-feriado {
            font-size: 10px;
            border-radius: 4px;
            padding: 2px 3px;
            margin-top: 2px;
            color: #a30000;
            font-weight: bold;
        }

        /* ============================= */
        /*   ESTILO PARA IMPRESSÃO       */
        /* ============================= */
        @media print {

            body {
                background: #fff !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                margin: 0;
                padding: 0;
            }

            header,
            .btn,
            .acoes,
            .links {
                display: none !important;
                visibility: hidden !important;
            }

            /* remover sombras e bordas fortes */
            .calendario-mes,
            .container,
            .curso-info,
            table,
            td,
            th {
                box-shadow: none !important;
                border-color: #444 !important;
            }

            /* compactar um pouco para caber melhor na A4 */
            .calendarios {
                gap: 10px !important;
                grid-template-columns: repeat(3, 1fr) !important;
                /* mantém 3 meses por linha */
                margin-top: 0 !important;
            }

            .calendario-mes {
                padding: 5px !important;
            }

            .calendario-mes h3 {
                margin: 0 0 5px 0 !important;
                font-size: 14px !important;
            }

            table {
                font-size: 9px !important;
            }

            td {
                height: 38px !important;
                padding: 2px !important;
            }

            .dia-numero {
                font-size: 10px !important;
            }

            .evento small {
                font-size: 7px !important;
            }

            /* forçar cores no PDF (sem deixar preto e branco) */
            .evento,
            .evento-feriado,
            .legend-color,
            .tag-uc {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            /* remover margens exageradas do navegador */
            @page {
                margin: 10mm;
                size: A4 landscape;
                /* vira horizontal automaticamente */
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Calendário do Curso</h1>
    </header>

    <div class="container">
        <a href="../index.php" class="btn">Voltar</a>
        <a href="ver_aulas.php?curso_id=<?= $curso_id ?>" class="btn">Ver lista de aulas</a>
        <a href="../api/calendario_curso_print.php?curso_id=<?= $curso_id ?>" target="_blank" class="btn">Versão para
            impressão / PDF</a>

        <div class="curso-info">
            <h2><?= htmlspecialchars($curso['nome']) ?> (<?= $curso['ano_letivo'] ?>)</h2>
            <p>
                <strong>Período:</strong>
                <?= date('d/m/Y', strtotime($curso['data_inicio'])) ?>
                até
                <?= date('d/m/Y', strtotime($curso['data_fim'])) ?><br>
                <strong>Turno:</strong> <?= htmlspecialchars($curso['turno']) ?><br>
                <strong>Dias de aula:</strong> <?= htmlspecialchars($curso['dias_aula']) ?><br>
                <strong>Carga horária total:</strong> <?= (int) $curso['carga_horaria_total'] ?>h
            </p>

            <h3>Professores neste curso:</h3>
            <ul class="prof-list">
                <?php if (count($professoresDoCurso) == 0): ?>
                    <li><em>Nenhuma aula encontrada para listar professores.</em></li>
                <?php else: ?>
                    <?php foreach ($professoresDoCurso as $prof => $ucsProf): ?>
                        <li>
                            <strong><?= htmlspecialchars($prof) ?>:</strong>
                            <?php foreach ($ucsProf as $sigla): ?>
                                <span class="tag-uc" style="background:#1a2041;">
                                    <?= htmlspecialchars($sigla) ?>
                                </span>
                            <?php endforeach; ?>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>

        <div class="calendarios">
            <?php
            if (empty($aulas)) {
                echo "<p><strong>Nenhuma aula encontrada para este curso. Gere o calendário primeiro.</strong></p>";
            } else {

                while ($cursorMes <= $dataFim) {
                    $ano = (int) $cursorMes->format('Y');
                    $mes = (int) $cursorMes->format('m');

                    // Se o mês inteiro for antes do início do curso, pula
                    $primeiroDoMes = new DateTime("$ano-$mes-01");
                    $ultimoDoMes = new DateTime("$ano-$mes-01");
                    $ultimoDoMes->modify('last day of this month');

                    if ($ultimoDoMes < new DateTime($curso['data_inicio'])) {
                        $cursorMes->modify('first day of next month');
                        continue;
                    }

                    // Se o mês inteiro for depois do fim do curso, para
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

                    // Qual dia da semana começa? (1 = Segunda, 7 = Domingo)
                    $primeiroDiaSemana = (int) $primeiroDoMes->format('N');
                    $diasNoMes = (int) $primeiroDoMes->format('t');

                    $dia = 1;
                    $celula = 1;

                    echo '<tr>';

                    // Espaços antes do primeiro dia
                    for ($i = 1; $i < $primeiroDiaSemana; $i++) {
                        echo '<td></td>';
                        $celula++;
                    }

                    // Preenche os dias do mês
                    while ($dia <= $diasNoMes) {
                        // Data completa
                        $dataStr = sprintf('%04d-%02d-%02d', $ano, $mes, $dia);

                        // Verifica se a data está dentro do período do curso
                        $estaNoPeriodo = (
                            $dataStr >= $curso['data_inicio'] &&
                            $dataStr <= $curso['data_fim']
                        );

                        // Verifica se é feriado
                        $ehFeriado = isset($feriadosPorData[$dataStr]);

                        // Define classes extras da célula
                        $classesTd = [];
                        if (!$estaNoPeriodo) {
                            $classesTd[] = 'cel-fora-curso';
                        }
                        if ($ehFeriado) {
                            $classesTd[] = 'cel-feriado';
                        }

                        echo '<td class="' . implode(' ', $classesTd) . '">';
                        echo '<div class="dia-numero">' . $dia . '</div>';

                        // Se for feriado, mostra info
                        if ($ehFeriado) {
                            $infoF = $feriadosPorData[$dataStr];
                            $rotulo = $infoF['tipo'] == 'FERIADO' ? 'Feriado' : $infoF['tipo'];
                            echo '<div class="evento-feriado">'
                                . htmlspecialchars($rotulo)
                                . '<br><small>' . htmlspecialchars($infoF['descricao']) . '</small>'
                                . '</div>';
                        }

                        // Aulas do dia
                        if (isset($aulasPorData[$dataStr])) {
                            foreach ($aulasPorData[$dataStr] as $aulaDia) {
                                $siglaUc = $aulaDia['sigla'] ?: $aulaDia['nome_uc'];
                                $corUc = $aulaDia['cor'] ?: '#1a2041';
                                $nomeCompleto = $aulaDia['nome_prof'];
                                $partes = explode(' ', trim($nomeCompleto));
                                $prof = $partes[0]; // primeiro nome
                                $horaIni = substr($aulaDia['hora_inicio'], 0, 5);
                                $horaFim = substr($aulaDia['hora_fim'], 0, 5);

                                echo '<div class="evento" style="background:' . htmlspecialchars($corUc) . ';">';
                                echo htmlspecialchars($siglaUc) . ' (' . $horaIni . '–' . $horaFim . ')';
                                $nomeCompleto = $aulaDia['nome_prof'];
                                $partes = explode(' ', trim($nomeCompleto));
                                $prof = $partes[0];
                                echo '<small>' . htmlspecialchars($prof) . '</small>';
                                echo '</div>';
                            }
                        }

                        echo '</td>';


                        // Controle de fim de linha
                        if ($celula % 7 == 0) {
                            echo '</tr>';
                            if ($dia < $diasNoMes) {
                                echo '<tr>';
                            }
                        }

                        $dia++;
                        $celula++;
                    }

                    // Completar linha final com células vazias, se faltar
                    if (($celula - 1) % 7 != 0) {
                        $resto = 7 - (($celula - 1) % 7);
                        for ($i = 0; $i < $resto; $i++) {
                            echo '<td></td>';
                        }
                        echo '</tr>';
                    }

                    echo '</table>';
                    echo '</div>'; // .calendario-mes
            
                    // Próximo mês
                    $cursorMes->modify('first day of next month');
                }
            }
            ?>
        </div>

        <?php if (!empty($aulas)): ?>
            <div class="legend">
                <strong>Legenda de cores por UC:</strong><br>
                <?php
                $coresPorUc = [];
                foreach ($aulas as $aula) {
                    $siglaUc = $aula['sigla'] ?: $aula['nome_uc'];
                    $corUc = $aula['cor'] ?: '#1a2041';
                    $coresPorUc[$siglaUc] = $corUc;
                }
                foreach ($coresPorUc as $sigla => $cor): ?>
                    <div class="legend-item">
                        <span class="legend-color" style="background:<?= htmlspecialchars($cor) ?>;"></span>
                        <span><?= htmlspecialchars($sigla) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>