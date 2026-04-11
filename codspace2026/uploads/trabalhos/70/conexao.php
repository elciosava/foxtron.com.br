<?php
$local = 'localhost'; 
$banco = 'mateus';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO ("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $erro){
    echo "nao foi dessa ve colega". $erro->getMessage();
}
?>
