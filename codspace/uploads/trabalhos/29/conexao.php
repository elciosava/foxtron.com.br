<?php
$local = 'localhost';
$banco = 'gabriel';
$usuario = 'root';
$senha = '';

try{
    $conexao = new PDO("mysql:host=$local;dbname=$banco",$usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOExcepition $e){
    echo "Nao deu boa!! " . $e->getMessage();
}
?>

