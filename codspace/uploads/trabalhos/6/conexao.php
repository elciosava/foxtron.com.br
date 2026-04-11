<?php
    $local = 'localhost';
    $banco = 'raul';
    $usuario = 'root';
    $senha = '';

    try{
        $conexao = new PDO("mysql:host=$local;dbname=$banco",$usuario,$senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        echo "Não de boa!!" .$e->getMessage();
    }
?>