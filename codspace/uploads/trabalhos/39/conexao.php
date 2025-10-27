<?php
    $local = 'localhost';
    $banco = 'liedson';
    $usuario = 'root';
    $senha = '';


    try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    die("deu ruim coisa!!" . $e->getMessage());
}
?>