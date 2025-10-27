<?php


include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
  
    
    $sql = "INSERT INTO produtos (nome)
    VALUES (:nome)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
   

     if($stmt->execute()){
        header("Location:cadastrar_professor.php");
        exit;
     }else{
        echo "Deu Ruim!";
     }
}

?>