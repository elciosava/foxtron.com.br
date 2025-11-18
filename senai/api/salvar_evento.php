<?php
require '../conexao/conexao.php';

$data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO agenda_professores 
        (professor_id, data, curso_id, uc_id, tipo, substituto_id, observacao)
        VALUES (:prof, :data, :curso, :uc, :tipo, :sub, :obs)";

$stmt = $conexao->prepare($sql);
$stmt->execute([
    ':prof' => $data['professor_id'],
    ':data' => $data['data'],
    ':curso' => $data['curso_id'],
    ':uc'   => $data['uc_id'],
    ':tipo' => $data['tipo'],
    ':sub'  => $data['substituto_id'],
    ':obs'  => $data['observacao']
]);

echo json_encode(['status' => 'ok']);
