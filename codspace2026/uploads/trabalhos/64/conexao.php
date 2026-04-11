<?php
    $local = 'localhost';
    $banco = 'elias';
    $usuario = 'root';
    $senha = '';

    try{
        $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $erro){
        echo "não deu buia!!!" . $erro->getMessage();
    }
?>