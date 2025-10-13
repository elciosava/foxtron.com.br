<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "meusite_db";

$conn = new mysqli($servidor, $usuario, $senha, $banco);
if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}
?>