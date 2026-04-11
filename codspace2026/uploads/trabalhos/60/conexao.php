<?php
    $local = 'localhost';
    $banco = 'ian';
    $usuario = 'root';
    $senha = '';

    try {
        $conexao = new PDO ("mysql:host=$local;dbname=$banco;",$usuario,$senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOExeption $erro){
        echo "nao foi dessa vez" . $erro->getMessage();
    }
?>