<?php
require '../conexao/conexao.php';

$semana_inicio = $_GET['semana_inicio'] ?? null;

if (!$semana_inicio) {
    echo json_encode([]);
    exit;
}

// calcula dias
$inicio = new DateTime($semana_inicio);
$fim = clone $inicio;
$fim->modify('+6 days');

// 🔹 BUSCA AULAS OFICIAIS
$sqlOficiais = "
    SELECT a.id,
           p.nome AS professor,
           uc.nome AS uc_nome,
           uc.sigla AS sigla,
           uc.cor AS cor,
           a.data,
           DAYNAME(a.data) AS dia_semana
    FROM aulas a
    JOIN professores p ON p.id = a.professor_id
    JOIN unidades_curriculares uc ON uc.id = a.uc_id
    WHERE a.data BETWEEN :i AND :f
";
$stmt = $conexao->prepare($sqlOficiais);
$stmt->execute(['i' => $inicio->format('Y-m-d'), 'f' => $fim->format('Y-m-d')]);
$aulasOficiais = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 🔹 BUSCA EVENTOS MANUAIS
$sqlManuais = "
    SELECT ag.*,
           p.nome AS professor,
           uc.nome AS uc_nome,
           uc.sigla,
           uc.cor
    FROM agenda_professores ag
    JOIN professores p ON p.id = ag.professor_id
    LEFT JOIN unidades_curriculares uc ON uc.id = ag.uc_id
    WHERE ag.data BETWEEN :i AND :f
";
$stmt2 = $conexao->prepare($sqlManuais);
$stmt2->execute(['i' => $inicio->format('Y-m-d'), 'f' => $fim->format('Y-m-d')]);
$aulasManuais = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// 🔹 COMBINA AS DUAS LISTAS
$final = [];

// 1) adiciona aulas oficiais
foreach ($aulasOficiais as $a) {
    $diaSemana = ucfirst(substr($a['dia_semana'], 0, 3)); // Seg Ter Qua ...
    $final[] = [
        'id' => $a['id'],
        'tipo' => 'AULA',
        'professor' => $a['professor'],
        'dia_semana' => $diaSemana,
        'uc_nome' => $a['uc_nome'],
        'sigla' => $a['sigla'],
        'cor' => $a['cor']
    ];
}

// 2) adiciona manuais (sobrescreve depois)
foreach ($aulasManuais as $a) {
    $final[] = [
        'id' => $a['id'],
        'tipo' => $a['tipo'],
        'professor' => $a['professor'],
        'dia_semana' => date('D', strtotime($a['data'])),
        'uc_nome' => $a['uc_nome'] ?? $a['tipo'],
        'sigla' => $a['sigla'] ?? $a['tipo'],
        'cor' => $a['cor'] ?? '#000'
    ];
}

echo json_encode($final);
