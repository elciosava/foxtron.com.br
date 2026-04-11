<?php
$local = 'localhost';
$banco = 'joel';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Num deu certo meu truta!!" . $e->getMessage();
}
?>
