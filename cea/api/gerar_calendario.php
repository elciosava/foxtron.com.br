<?php
require '../conexao/conexao.php';

// =============================
// 1. RECEBER DADOS DO FORM
// =============================
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acesso inválido.");
}

$curso_id     = $_POST['curso_id'] ?? null;
$hora_inicio  = $_POST['hora_inicio'] ?? '13:30';
$limparAntes  = isset($_POST['limpar_antes']) ? true : false;

if (!$curso_id) {
    die("Curso não informado.");
}

// Ajustar formato da hora (mantém)
$horaInicio = date("H:i:s", strtotime($hora_inicio));


// =============================
// 2. CARREGAR O CURSO
// =============================
$sql = "SELECT * FROM cursos WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->execute([':id' => $curso_id]);
$curso = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$curso) {
    die("Curso não encontrado.");
}

// Converter string de dias em array
$diasPermitidos = explode(',', $curso['dias_aula']);
$diasPermitidos = array_map('trim', $diasPermitidos);

/* ============================================
   CÁLCULO CORRIGIDO DA HORA FINAL
   ============================================ */
// horas_por_dia como float
$horasDia = (float)$curso['horas_por_dia'];  // ex: 4.00

// converte para segundos
$segundosDia = (int) round($horasDia * 3600);

// timestamp do início
$tsInicio = strtotime($horaInicio);

// soma os segundos
$tsFim = $tsInicio + $segundosDia;

// formata a hora final
$horaFim = date('H:i:s', $tsFim);
/* ============================================ */


// =============================
// 3. APAGAR AULAS ANTIGAS (se marcado)
// =============================
if ($limparAntes) {
    $sql = "DELETE FROM aulas WHERE curso_id = :curso";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':curso' => $curso_id]);
}

// =============================
// 4. CARREGAR UC's DO CURSO
// =============================
$sql = "SELECT * FROM unidades_curriculares 
        WHERE curso_id = :curso
        ORDER BY ordem ASC";
$stmt = $conexao->prepare($sql);
$stmt->execute([':curso' => $curso_id]);
$ucs = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($ucs) == 0) {
    die("Nenhuma unidade curricular cadastrada para este curso.");
}

// =============================
// 5. CARREGAR FERIADOS
// =============================
$sql = "SELECT data FROM feriados";
$stmt = $conexao->query($sql);
$feriados = $stmt->fetchAll(PDO::FETCH_COLUMN);
$feriados = array_map('trim', $feriados);

// =============================
// 6. PREPARAÇÃO DO ALGORITMO
// =============================
$dataAtual = new DateTime($curso['data_inicio']);
$dataFim   = new DateTime($curso['data_fim']);

$ucIndex = 0;
$horasRestantesUC = $ucs[$ucIndex]['carga_horaria'];

$mapaDias = [
    'MON' => 'SEG',
    'TUE' => 'TER',
    'WED' => 'QUA',
    'THU' => 'QUI',
    'FRI' => 'SEX',
    'SAT' => 'SAB',
    'SUN' => 'DOM'
];

$totalAulasCriadas = 0;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Geração</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f3f6fc; margin:0; }
        header { background:#1a2041; color:#fff; padding:15px 20px; }
        header h1 { margin:0; font-size:20px; }
        .container {
            max-width: 900px;
            margin: 25px auto;
            background:#fff;
            padding:20px 25px;
            border-radius:8px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        .log {
            max-height: 400px;
            overflow-y: auto;
            background:#f7f7ff;
            padding:10px;
            border-radius:6px;
            font-size:14px;
        }
        a.btn {
            display:inline-block;
            margin-top:15px;
            padding:10px 15px;
            background:#1a2041;
            color:#fff;
            text-decoration:none;
            border-radius:6px;
            font-size:14px;
        }
    </style>
</head>
<body>
<header>
    <h1>Geração de Calendário - <?= htmlspecialchars($curso['nome']) ?></h1>
</header>
<div class="container">
    <p><strong>Período:</strong> <?= date('d/m/Y', strtotime($curso['data_inicio'])) ?>
        até <?= date('d/m/Y', strtotime($curso['data_fim'])) ?></p>
    <p><strong>Horário:</strong> <?= substr($horaInicio,0,5) ?> às <?= substr($horaFim,0,5) ?></p>

    <div class="log">
        <?php
        // =============================
        // 7. LOOP PRINCIPAL
        // =============================
        while ($dataAtual <= $dataFim && $ucIndex < count($ucs)) {

            $diaSemana = strtoupper($dataAtual->format('D')); // SUN, MON...
            $dia = $mapaDias[$diaSemana];

            // Não é dia de aula
            if (!in_array($dia, $diasPermitidos)) {
                $dataAtual->modify('+1 day');
                continue;
            }

            // É feriado / recesso
            if (in_array($dataAtual->format('Y-m-d'), $feriados)) {
                echo "Ignorado (feriado): " . $dataAtual->format('d/m/Y') . "<br>";
                $dataAtual->modify('+1 day');
                continue;
            }

            // Proteção: se professor_id da UC for nulo, evita erro
            $professorId = $ucs[$ucIndex]['professor_id'] ?? null;
            if (!$professorId) {
                $professorId = 1; // depois você pode deixar isso dinâmico
            }

            // GRAVAR AULA
            $sql = "INSERT INTO aulas 
                    (curso_id, uc_id, professor_id, data, hora_inicio, hora_fim)
                    VALUES 
                    (:curso, :uc, :professor, :data, :inicio, :fim)";

            $stmt = $conexao->prepare($sql);
            $stmt->execute([
                ':curso'     => $curso_id,
                ':uc'        => $ucs[$ucIndex]['id'],
                ':professor' => $professorId,
                ':data'      => $dataAtual->format('Y-m-d'),
                ':inicio'    => $horaInicio,
                ':fim'       => $horaFim
            ]);

            $sigla = $ucs[$ucIndex]['sigla'] ?: $ucs[$ucIndex]['nome'];
            echo "Aula criada: " . $dataAtual->format('d/m/Y') . " → " . htmlspecialchars($sigla) . "<br>";

            $totalAulasCriadas++;

            // Desconta as horas usadas nesse dia
            $horasRestantesUC -= $curso['horas_por_dia'];

            // Se a UC foi concluída, passa pra próxima
            if ($horasRestantesUC <= 0) {
                $ucIndex++;
                if ($ucIndex < count($ucs)) {
                    $horasRestantesUC = $ucs[$ucIndex]['carga_horaria'];
                    echo "<strong>→ Mudando para a próxima UC: "
                         . htmlspecialchars($ucs[$ucIndex]['sigla'] ?: $ucs[$ucIndex]['nome'])
                         . "</strong><br>";
                }
            }

            // Próximo dia
            $dataAtual->modify('+1 day');
        }

        if ($totalAulasCriadas == 0) {
            echo "<strong>Nenhuma aula foi gerada. Verifique datas, dias de aula e carga horária.</strong>";
        } else {
            echo "<br><strong>Total de aulas criadas: $totalAulasCriadas</strong>";
        }
        ?>
    </div>

    <a href="../index.php" class="btn">Voltar</a>
    <a href="../paginas/ver_aulas.php?curso_id=<?= $curso_id ?>" class="btn">Ver aulas geradas</a>
</div>
</body>
</html>
