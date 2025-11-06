<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $sobrenome= $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $numero = $_POST['numero'];
    $email = $_POST['email'];
   
           $sql = "INSERT INTO cadastros(nome, sobrenome, nascimento, numero, email)
        VALUES (:nome, :sobrenome, :nascimento, :numero, :email,)";

        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':nascimento', $nascimento);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':email', $email);
        
        if($stmt->execute()){
            header("Location:cadastros.php");
        }else{ 
              echo "<p style= 'color:red;'>Deu ruim!!</p>";
        }

     }
?>