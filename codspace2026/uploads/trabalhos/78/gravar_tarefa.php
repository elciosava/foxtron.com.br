<?php
ini_set("display_errors",0);

include 'conexao.php';

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data_inicio = $_POST['data_inicio'];
$data_final = $_POST['data_final'];

$sql = "INSERT INTO agenda (titulo, descricao, data_inicio, data_final)
VALUES (:titulo, :descricao, :data_inicio, :data_final)";

$stmt = $conexao->prepare($sql);

    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':data_inicio', $data_inicio);
    $stmt->bindParam(':data_final', $data_final);

    $stmt->execute();
?>