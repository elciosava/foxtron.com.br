<?php
require '../conexao/conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM agenda_professores WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->execute(['id' => $id]);

echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
