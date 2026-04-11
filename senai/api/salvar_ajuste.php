<?php
header('Content-Type: application/json');
require '../conexao/conexao.php';

$dados = json_decode(file_get_contents('php://input'), true);

if (!$dados || !isset($dados['aula_id'])) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Dados inválidos']);
    exit;
}

$aula_id = $dados['aula_id'];
$prof_sub = $dados['professor_substituto_id'] ?: null;
$cancelada = !empty($dados['cancelada']) ? 1 : 0;
$obs = $dados['observacao'] ?: null;

// Verifica se já existe ajuste
$sqlVer = "SELECT id FROM agenda_professor WHERE aula_id = :aula_id";
$stmt = $conexao->prepare($sqlVer);
$stmt->execute([':aula_id' => $aula_id]);

if ($stmt->rowCount() > 0) {
    // Atualiza
    $sql = "UPDATE agenda_professor
            SET professor_substituto_id = :prof, cancelada = :cancelada, observacao = :obs
            WHERE aula_id = :aula_id";
} else {
    // Insere
    $sql = "INSERT INTO agenda_professor
            (aula_id, professor_substituto_id, cancelada, observacao)
            VALUES (:aula_id, :prof, :cancelada, :obs)";
}

$stmt2 = $conexao->prepare($sql);
$stmt2->execute([
    ':aula_id' => $aula_id,
    ':prof' => $prof_sub,
    ':cancelada' => $cancelada,
    ':obs' => $obs
]);

echo json_encode(['status' => 'ok']);
