<?php

$local = 'localhost';
//$banco = 'elcio';
$banco = 'eletricidade';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO ("mysql:host=$local;dbname=$banco;",$usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $erro){
    echo "naoo deu" . $erro->getMessage();
}