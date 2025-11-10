<?php
    //declarar 4 variaveis principais
    $local = 'localhost';
    $banco = 'liedson';
    $usuario = 'root';
    $senha = '';

    //tentar uma conexao usando nossas variaveis 
    try{
        
        $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        echo "num deu certo" . $e->getMessage();
    }
?>