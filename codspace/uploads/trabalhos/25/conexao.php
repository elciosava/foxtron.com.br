<?php
$local = 'localhost';
$banco = 'lucas';
$usuario = 'root';
$senha = '';//s4va6o841A@

try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo "Num deu certo piazada!! " . $e->getMessage();
}
?>