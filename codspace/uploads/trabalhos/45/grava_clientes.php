<?php 
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

    $sql = "INSERT INTO clientes (nome, cpf)
            VALUES (:nome, :cpf)";
          
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam('nome',$nome);
    $stmt->bindParam('cpf',$cpf);

    if ($stmt->execute()){
        header("Location:clientes.php");
        exit;
    }else {
        echo "<p>nao deu certo :C</p>";
    }
        }
?>