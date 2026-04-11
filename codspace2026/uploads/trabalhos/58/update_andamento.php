<?php

include 'conexao.php';
$id = $_GET['id'];

$sql = "UPDATE agenda SET estatus ='andamento' WHERE id = :id";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id',$id);

if ($stmt->execute()){
    header("Location:agenda.php");
}else echo "não deu buia";

?>