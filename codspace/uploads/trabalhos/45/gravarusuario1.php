<?php
include 'conexao.php';


   if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nasc = $_POST['data_nasc'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    
  $insert = "INSERT INTO anderson ( `nome`, `sobrenome`,`data_nasc`, `telefone`, `email`)
               VALUE (:nome, :sobrenome, :data_nasc, :telefone, :email)";
    $stmt = $conexao->prepare($insert);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sobrenome', $sobrenome);
    $stmt->bindParam(':data_nasc', $data_nasc);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);
   
    if ($stmt->execute()) {
      header("Location: cadastrar_usuario1.php");
      exit;
    }else{
        $mensagem = "Não deu coisa...";
    }
   }
?>