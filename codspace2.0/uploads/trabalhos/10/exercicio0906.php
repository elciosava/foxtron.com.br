<?php
    //4 variaveis que sao padrao
    $local = 'localhost';
    $banco = 'fernando';
    $usuario = 'root';
    $senha = '';

    //tentar uma conexao com o banco
    try{
        $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDO $erro){
        echo "Num deu conexão, meu truta." . $erro->getMessage();
    }