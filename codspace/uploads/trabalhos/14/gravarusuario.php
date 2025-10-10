<?php
    $local = 'localhost';
    $banco = 'senai';
    $usuario = 'root';
    $senha = '';

    try{
        $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);

        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM usuario";

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $usuarios = $stmt->fetchALL(PDO::FETCH_ASSOC);
    }catch (PDOExeption $e){
        echo("nao deu");
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $insert = "INSERT INTO usuarios (`id`,`nome`,`email`,`senha`)
                     VALUES (:nome, :emal, :senha)";
        $stmt = $conexao->prepare($insert);
        $stmt->bindparam(':nome', $nome);
        $stmt->bindparam(':email', $email);
        $stmt->bindparam(':senha', $senha);
    }
    if ( $stmt->execute()){
        $mensagem = "usuario cadastrado com sucesso";
    }else{
        $mensagem = "não funfo";
    }
