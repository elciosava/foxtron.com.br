<?php
require '../conexao/conexao.php';
$curso_id = $_GET['curso_id'];

$sql = "SELECT id, nome, sigla, cor FROM unidades_curriculares WHERE curso_id = :c ORDER BY ordem";
$stmt = $conexao->prepare($sql);
$stmt->execute(['c' => $curso_id]);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
