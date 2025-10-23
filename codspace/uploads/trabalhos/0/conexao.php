<?php

$localhost = "localhost";
$usuario = "root";
$senha = "";
$banco = "guilherme";


try {
    $conexao = new PDO("mysql:host=$localhost;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}

?>