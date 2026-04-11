<?php
include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
  
    
    $sql = "INSERT INTO empresa (nome)
    VALUES (:nome)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
   

     if($stmt->execute()){
        header("Location:cadastrar_peca.php");
        exit;
     }else{
        echo "Deu Ruim!";
     }
}

?>