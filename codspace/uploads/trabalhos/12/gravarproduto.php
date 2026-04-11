<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $quantidade= $_POST['quantidade'];
    $valor = $_POST['valor'];
   
           $sql = "INSERT INTO produtos (nome, quantidade, valor)
        VALUES (:nome, :quantidade, :valor)";

        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':valor', $valor);
        
        if($stmt->execute()){
            header("Location:cadastrarproduto.php");
        }else{ 
              echo "<p style= 'color:red;'>Deu ruim!!</p>";
        }

     }
?>
