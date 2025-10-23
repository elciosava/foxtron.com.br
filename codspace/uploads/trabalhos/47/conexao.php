<?php
    $local = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'saimon';

    try{
        $conexao = new PDO("mysql:host=$local;dbname=$banco",$usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        echo "deu  ruim " . $e->getMessage();
    }
    
?>