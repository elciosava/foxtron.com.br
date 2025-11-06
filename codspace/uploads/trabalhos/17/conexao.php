<?php
    $local = 'localhost';
    $banco = 'giovani';
    $usuario = 'root';
    $senha = '';

    try{
        $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOEXception $e){
        echo "num deu meu truta " . $e->getMessage();
    }
?>
