<?php
require '../conexao/conexao.php';

$sql = "SELECT id, nome FROM professores ORDER BY nome";
$stmt = $conexao->query($sql);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
