<?php
$host = 'localhost';
$banco = 'senai_calendario';
$usuario = 'root';
$senha = '';

//quando subir para o site usar essa senha
//$senha = 's4va6o841A@';

try {
    $conexao = new PDO("mysql:host=$host;dbname=$banco;charset=utf8mb4", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conectado!";
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}
