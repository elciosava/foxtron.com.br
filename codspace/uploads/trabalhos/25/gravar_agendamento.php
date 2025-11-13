<?php

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $paciente = $_POST['paciente'];
    $cpf = $_POST['cpf'];
    $contato = $_POST['contato'];

    $sql = "INSERT INTO nome (nome, paciente, cpf, contato)
            VALUES (:nome, :paciente, :cpf, :contato)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':paciente', $paciente);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':contato', $contato);

    if ($stmt->execute()){
        header("Location:cadastro_agendamento.php");
        exit;
    }else{
        echo "não deu certo!!";
    }
   
}
?>