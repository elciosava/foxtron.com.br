<?php
 
$local = 'localhost';
$banco = 'lipe';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$local;doname=$banco;", $usuario, $senha);
    $conexao->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOExeption $erro){
    echo "vai da não." . $erro->getmessage();
}