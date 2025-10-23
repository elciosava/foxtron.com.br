<?php
$local = 'localhost';
$banco = 'Helen';
$usuario = 'root';
$senha = ''; // s4va6o41a@

try{
    $conexao=new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOExceptiom $e){
    echo "nao deu truta!" . $e->getmessage();
}
?>
