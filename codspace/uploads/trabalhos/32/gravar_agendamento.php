<?php

include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];

    $sql = "INSERT INTO agendamento (nome, data, horario)
            VALUES(:nome, :data, :horario)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':data', $data);
    $stmt->bindParam(':horario', $horario);

    if ($stmt->execute()){
        header("location:agendar_horario.php");
        exit;
    }else{
        echo "nao deu boa!";
    }
}
?>

