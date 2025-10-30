<?php
$local = 'localhost';
$banco = 'Helen';
$usuario = 'root';
$senha = ''; 

try{
    $conexao=new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOExceptiom $e){
    echo "nao deu truta!" . $e->getmessage();
}
?>