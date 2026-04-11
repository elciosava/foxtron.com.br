<?php

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST ['email'];

        $sql = "INSERT INTO ana (`nome`, `sobrenome`, `data_nascimento`, `telefone`, `email`)
        VALUES (:nome, :sobrenome, :data_nascimento, :telefone, :email)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
    
        if ($stmt->execute()){
           header("location: exercicio_03.php");
           exit;
        } else {
           $mensagem = "nao deu ceerto...";
        }
    } 
?>