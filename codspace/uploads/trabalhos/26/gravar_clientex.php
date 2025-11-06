<?php
    include 'conexao.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST ['nome'];
        $sobrenome = $_POST ['sobrenome'];
        $data_nascimento = $_POST ['data_nascimento'];
        $email = $_POST ['email'];
        $telefone = $_POST ['telefone'];

        $sql = "INSERT INTO clientex (nome, sobrenome, data_nascimento, email, telefone)
                VALUES (:nome, :sobrenome, :data_nascimento, :email, :telefone)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam('nome', $nome);
        $stmt->bindParam('sobrenome', $sobrenome);
        $stmt->bindParam('data_nascimento', $data_nascimento);
        $stmt->bindParam('email', $email);
        $stmt->bindParam('telefone', $telefone);
        $stmt->execute();

        echo "Felizmente a tesoura não comeu!";
    }else{
        echo "A conexão não procedeu. A tesoura comeu!";
    }
?>