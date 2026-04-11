<?php

    $local = 'localhost';
    $banco = 'agenda';
    $usuario = 'root';
    $senha = '';

    try {
        $conexao = new PDO("mysql:host=$local;dbname=$banco",$usuario,$senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $erro){
        echo "Não foi dessa vez" . $erro->getMessage();
    }
?>