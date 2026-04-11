<?php
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $pecas = $_POST['pecas'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO pecas (id, pecas, quantidade)
            VALUES (:id,:pecas,:quantidade)";
          
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id',$id );
    $stmt->bindParam(':pecas',$pecas );
    $stmt->bindParam(':quantidade',$quantidade);

    if ($stmt->execute()){
        header("Location:cadastra_peca.php");
        exit;
    }else{
        echo "<p>nao deu certo :C</p>";
    }
        }
?>