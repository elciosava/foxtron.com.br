<?php
header('Content-Type: application/json');
require '../conexao/conexao.php';

$dados = json_decode(file_get_contents('php://input'), true);

if (!$dados || !isset($dados['curso_id']) || !isset($dados['data'])) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Dados inválidos']);
    exit;
}

$curso_id = $dados['curso_id'];
$data = $dados['data'];
$tipo = $dados['tipo'] ?? 'NORMAL'; // NORMAL significa remover a exceção
$descricao = $dados['descricao'] ?? '';

try {
    if ($tipo === 'NORMAL') {
        $sql = "DELETE FROM excecoes_calendario WHERE curso_id = :curso_id AND data = :data";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([':curso_id' => $curso_id, ':data' => $data]);
    } else {
        $sql = "INSERT INTO excecoes_calendario (curso_id, data, tipo, descricao) 
                VALUES (:curso_id, :data, :tipo, :descricao)
                ON DUPLICATE KEY UPDATE tipo = :tipo, descricao = :descricao";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([
            ':curso_id' => $curso_id,
            ':data' => $data,
            ':tipo' => $tipo,
            ':descricao' => $descricao
        ]);
    }

    echo json_encode(['status' => 'ok', 'mensagem' => 'Calendário atualizado com sucesso!']);
} catch (Exception $e) {
    echo json_encode(['status' => 'erro', 'mensagem' => $e->getMessage()]);
}
