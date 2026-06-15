<?php

//4 variaveis
$local = 'localhost';
$banco = 'farias';
$usuario = 'root';
$senha = '';
//tentar uma conexao

try{
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $erro){
    echo"Num deu mano veio!". $erro->getMessage();
}

$id_tarefa = $_GET['id_tarefa'];
$sql = "UPDATE tarefas SET status_tarefa = 'ANDAMENTO' WHERE id_tarefa = :id_tarefa";
$stmt = $conexao->prepare($sql);
$stmt->bindParam('id_tarefa',$id_tarefa);
$stmt->execute();

header("Location:atividadedofarias.php");