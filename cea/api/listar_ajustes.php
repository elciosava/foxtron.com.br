<?php
header('Content-Type: application/json');
require '../conexao/conexao.php';

if (!isset($_GET['semana_inicio'])) {
    echo json_encode([]);
    exit;
}

$semanaInicio = $_GET['semana_inicio'];

$sql = "SELECT ap.*, a.data, a.professor_id AS professor_original
        FROM agenda_professor ap
        JOIN aulas a ON ap.aula_id = a.id
        WHERE a.data BETWEEN :ini AND DATE_ADD(:ini, INTERVAL 6 DAY)";

$stmt = $conexao->prepare($sql);
$stmt->execute([
    ':ini' => $semanaInicio
]);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
