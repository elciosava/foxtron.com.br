<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "saimon";

try {
  $conexao = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
  $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch (PDOEception $erro){
  echo "deu ruim meu truta. " . $erro->getMesage();
}
?>
