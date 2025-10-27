<?php
    $local = 'localhost';
    $banco = 'ana';
    $usuario = 'root';
    $senha = '';

    try{
        $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOEcxeption $e){
        die("deu ruim coisa" . $e->getMenssage());
    }

    
?>