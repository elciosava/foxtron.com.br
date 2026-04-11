<?php

include'conexao.php';
$sid = $_GET['id'];

$sql = "UPDATE agenda SET estatus = 'concluido' WHERE id = :id";

$stmt = $conexao-> prepare($sql);
$stmt->bindParam(':id', $id);

if ($stmt->execute ()){
    header("Locattion:index.php");
}else echo "não deu";

?>