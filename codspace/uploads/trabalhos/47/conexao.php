<link rel="stylesheet" href="style.css">

<?php
$local = 'localhost';
$usuario = 'root';
$senha = '';//s4va6o841A@
$banco = 'saimon';

try{
    $conexao = new PDO("mysql:host=$local;dbname=$banco",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
}catch (PDOException $e){
    echo"nao deu certo." . $e->getMessage(); 
}
?>