<?php
// Configurações do banco de dados
$host = 'localhost';
$dbname = 'portfolio';
$username = 'root';
//$password = ''; // No sandbox do Manus, geralmente o MySQL está sem senha por padrão
$password = 's4va6o841A@';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Para depuração (remover em produção)
    die("Erro de conexão: " . $e->getMessage());
}
