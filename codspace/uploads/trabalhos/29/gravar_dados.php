<?php 
include 'conexao.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
         $email = $_POST['email'];
          $telefone= $_POST['telefone'];
           $nascimento = $_POST['nascimento'];




        $insert = "INSERT INTO dados ( `nome`, `sobrenome`, `email`, `telefone`, `nascimento` )
                VALUES ( :nome, :sobrenome, :email, :telefone, :nascimento)";
        $stmt = $conexao->prepare($insert);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
         $stmt->bindParam(':email', $email);
          $stmt->bindParam(':telefone', $telefone);
           $stmt->bindParam(':nascimento', $nascimento);
        

        if ( $stmt->execute()){
            $mensagem = "usuario cadastro com sucesso";
        } else {
            $mensagem = "nao deu boa o brique...";
        }
    }

    

?>