<?php
include 'conexao.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $insert="INSERT INTO usuarios (`nome`,`sobrenome`, `email`, `senha`)
         VALUES (:nome, :sobrenome, :email, :senha)";
         
        $stmt = $conexao->prepare($insert);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        if($stmt->execute()){
         header("Location: cadastrarusuario.php");
         exit;
        }else{
        $mensagem = "Não deu coisa...";
    }
}


?>