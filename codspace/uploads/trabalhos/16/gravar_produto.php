<?php

include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];

    $sql = "INSERT INTO produtos (nome, quantidade, valor) 
            VALUES (:produto, :quantidade, :valor)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':produto', $produto);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':valor', $valor);

    if ($stmt->execute()){
        header("location:cadastrar_produto.php");
        exit;
    }else{
        echo "não deu boa!";
    }
}