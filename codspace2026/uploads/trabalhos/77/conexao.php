<?php


$local = 'localhost';//local onde esta o banco de dados
$banco = 'login'; // nome do banco de dados
$usuario = 'root'; //usuario do banco de dados
$senha = '' ;      //senha padrao do banco de dados

try{
    $conexao = new PDO ( "mysql:host=$local;dbname=$banco",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   
}catch (PDOException $erro) {
    echo "Não conectou". $erro->getMessage();
}



?>