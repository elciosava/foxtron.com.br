<?php
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];

    $sql = "INSERT INTO professores (nome)
            VALUES (:nome)";
          
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome',$nome);

    if ($stmt->execute()){
        header("Location:cadastra_professor.php");
        exit;
    }else{
        echo "<p>nao deu certo :C</p>";
    }
        }
?>