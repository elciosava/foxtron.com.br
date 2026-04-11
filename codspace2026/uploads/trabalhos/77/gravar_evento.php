<?php
//ini_set("display_errors",0);

include 'conexao.php';

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data_evento = $_POST['data_evento'];
$horario_evento = $_POST['horario_evento'];

$sql = "INSERT INTO agenda_eventos (titulo,descricao,data_evento,horario_evento)
VALUES (:titulo,:descricao,:data_evento,:horario_evento)";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':titulo',$titulo);
$stmt->bindParam(':descricao',$descricao);
$stmt->bindParam(':data_evento',$data_evento);
$stmt->bindParam(':horario_evento',$horario_evento);
$stmt->execute();

header("Location: aula1603.php");
exit();

?>