<?php
// api/toggle_modalidade_aula.php
require '../conexao/conexao.php';

header('Content-Type: application/json; charset=utf-8');

// Lê o JSON enviado pelo fetch()
$body = json_decode(file_get_contents('php://input'), true);

$id         = isset($body['id']) ? (int)$body['id'] : 0;
$modalidade = strtoupper(trim($body['modalidade'] ?? ''));

// modalidades permitidas no sistema
$permitidas = ['PRESENCIAL', 'AVA', 'IND'];

if (!$id || !in_array($modalidade, $permitidas, true)) {
    echo json_encode([
        'status'   => 'erro',
        'mensagem' => 'Dados inválidos para atualização.'
    ]);
    exit;
}

try {
    $sql = "UPDATE aulas SET modalidade = :modalidade WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        ':modalidade' => $modalidade,
        ':id'         => $id
    ]);

    echo json_encode([
        'status'     => 'ok',
        'modalidade' => $modalidade
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'status'   => 'erro',
        'mensagem' => $e->getMessage()
    ]);
}
