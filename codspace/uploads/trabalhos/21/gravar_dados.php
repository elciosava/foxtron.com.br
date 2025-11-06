<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $data_nasc = $_POST['data_nasc'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];
  
 

  if(!empty($nome)){
    $sql = "INSERT INTO dados (`nome`, `sobrenome`, `email`, `data_nasc`, `telefone`)
        VALUES (:nome, :sobrenome, :email, :data_nasc, :telefone)";
     $stmt = $conexao->prepare($sql);
     $stmt->bindParam(':nome', $nome);
     $stmt->bindParam(':sobrenome', $sobrenome);
     $stmt->bindParam(':email', $email);
     $stmt->bindParam(':telefone', $telefone);
     $stmt->bindParam(':data_nasc', $data_nasc);
     

     if($stmt->execute()){
        header("location: dados.php");
        exit;
     }else{
        echo "<p style='color:red;'>Deu muito ruim!!</p>";
     }
  }

}
?>