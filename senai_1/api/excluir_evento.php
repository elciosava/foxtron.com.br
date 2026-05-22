<?php
require '../conexao/conexao.php';

$data = json_decode(file_get_contents("php://input"), true);

$sql = "DELETE FROM agenda_professores WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->execute(['id' => $data['id']]);

echo json_encode(['status' => 'ok']);
