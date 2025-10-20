<?php
    $local = 'localhost';
    $banco = 'vinicius';
    $usuario = 'root';
    $senha = ''; // s4va60841A@

    try {
        $conexao = new PDO("mysql:host=$local;dbname=$banco",$usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch (PDOException $e){
        echo "nao deu truta!" . $e->getMessage();
    }
?>