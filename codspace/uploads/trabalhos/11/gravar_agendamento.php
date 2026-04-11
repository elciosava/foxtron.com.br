<?php

include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $data = $_POST['dia'];
    $horario = $_POST['horario'];

    $sql = "INSERT INTO produtos (nome, dia, horario)
        VALUES (:produto, :dia, :horario)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':data', $dia);
    $stmt->bindParam(':horario', $horario);

    if ($stmt->execute()){
        header("location:agendar_horario.php");
        exit;
    }else{
        echo "nao deu boa!!";
    }
}

