<?php
    $local = 'localhost';
    $banco = 'renan';
    $usuario = 'root';
    $senha = '';


    try {
        $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMOE_EXCEPTION);
    }catch (PDOException $e){
        die("deu ruim coisa!!" . $e->getMessage());
    }
    
?>