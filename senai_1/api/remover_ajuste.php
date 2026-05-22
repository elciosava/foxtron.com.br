<?php
header('Content-Type: application/json');
require '../conexao/conexao.php';

$dados = json_decode(file_get_contents('php://input'), true);

if (!isset($dados['aula_id'])) {
    echo json_encode(['status' => 'erro']);
    exit;
}

$sql = "DELETE FROM agenda_professor WHERE aula_id = :id";
$stmt = $conexao->prepare($sql);
$stmt->execute([':id' => $dados['aula_id']]);

echo json_encode(['status' => 'ok']);
