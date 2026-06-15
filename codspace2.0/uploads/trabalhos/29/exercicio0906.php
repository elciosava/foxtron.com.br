<?php

//4 variaveis que sao padrao
$local = 'localhost' ;
$banco = 'joao';
$usuario = 'root';
$senha = '';
//tentar uma conexao com o banco
try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch (PDOException $erro){
    echo "num deu conexã, meu truta." . $erro->getMessage();
}