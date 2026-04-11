<?php

include'conexao.php';
$sid = $_GET['id'];

$sql = "UPDATE agenda SET estatus = 'andamento' WHERE id = :id";

$stmt = $conexao-> prepare($sql);
$stmt->bindParam(':id', $id);

if ($stmt->execute ()){
    header("Locattion:index.php");
}else echo "não deu";

?>