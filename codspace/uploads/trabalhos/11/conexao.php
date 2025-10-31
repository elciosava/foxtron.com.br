<?php
$local = 'localhost';
$banco = 'vinicius';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExption $e) {
    die("não deu boa!!" . $e->getMessage());
}
?>