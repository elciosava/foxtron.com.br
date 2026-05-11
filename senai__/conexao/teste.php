<?php
require 'conexao.php';

$sql = "SHOW TABLES";
$stmt = $conexao->query($sql);
$tabelas = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo "<h2>Banco senai_calendario conectado!</h2>";
echo "<pre>";
print_r($tabelas);
echo "</pre>";
