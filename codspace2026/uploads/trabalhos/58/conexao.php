<?php
    $local = 'localhost';
    $banco = 'joao';
    $usuario = 'root';
    $senha = '';

    try{
        $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $erro){
        echo "Não deu certo meu nobre" . $erro->getMessage();
    }
?>