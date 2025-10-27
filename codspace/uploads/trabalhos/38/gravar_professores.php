<?php

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];

    $sql = "INSERT INTO professores (nome)
             VALUE (:nome)";

             $stmt = $conexao->prepare($sql);
             $stmt->bindParam(':nome', $nome);

             if ($stmt->execute()){
                header("location:cadastrar_professor.php");
                exit;
             }else{
                echo "nao deu truta";
             }
}