<?php
header('Content-Type: application/json');
require '../conexao/conexao.php';

if (!isset($_GET['aula_id'])) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Aula não informada']);
    exit;
}

$aula_id = $_GET['aula_id'];

$sql = "SELECT * FROM agenda_professor WHERE aula_id = :aula_id LIMIT 1";
$stmt = $conexao->prepare($sql);
$stmt->execute([':aula_id' => $aula_id]);

echo json_encode($stmt->fetch(PDO::FETCH_ASSOC) ?: []);
