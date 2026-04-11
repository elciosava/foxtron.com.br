<?php
//declarar 4 variaveis principais
    $local = 'localhost';
    $banco = 'pedropacheco';
    $usuario = 'root';
    $senha = '';

    //tentar uma conexao usando nossas variaveis
    try{
        //criar a variavel de conexao
        $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){ 
        echo "não sobrou nada pros betinha" . $e->getMessage();
    }
    ?>