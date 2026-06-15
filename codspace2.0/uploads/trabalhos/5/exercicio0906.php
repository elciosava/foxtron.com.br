<?php
    //4 variaveis que sao padrao
    $local = 'localhost';
    $banco = 'isaias';
    $usuario = 'root';
    $senha = '';

//tentar uma conexao com banco
try{
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $erro){
    echo "Num deu conexao, meu truta." . $erro->getMessage();
}
