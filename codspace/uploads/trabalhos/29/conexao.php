<?php

$local = 'localhost';
$banco = 'gabriel';
$usuario = 'root';
$senha = '';

try{
    $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo "num deu meu kid" . $e->getMessage();
}
?>