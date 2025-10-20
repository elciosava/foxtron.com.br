<?php
    $local = 'localhost';
    $banco = 'joel';
    $usuario = 'root';
    $senha = ''; // s4va6o841@

    try{
        $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
    }catch (PDOExpection $e){
       echo "nao deu truta!" . $e->getmessage();
    }
?>