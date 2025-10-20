<?php
    $local = 'localhost';
    $banco = 'felipe';
    $usuario = 'root';
    $senha = ''; // s4va6o841A@

    try {
        $conexao = new PDO("mysql:host=$local;dbname=$banco",$usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }catch (PDOexception $e){
        echo "nao deu truta!" . $e->getMessage();
    }
?>