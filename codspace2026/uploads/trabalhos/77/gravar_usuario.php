<?php
//ini_set("display_errors",0);

include 'conexao.php';

$nome= $_POST['nome'];
$senha = $_POST['senha'];

$sql = "INSERT INTO usuarios (nome,senha)
VALUES (:nome,:senha)";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':nome',$nome);
$stmt->bindParam(':senha',$senha);
$stmt->execute();


?>