<?php
    //declarar 4 variaveis principais
    $local = 'localhost';
    $banco = 'vinicius';
    $usuario = 'root';
    $senha = '';
    
    //tentar uma conexao no banco de dados
    try {
        //criar a variavel de conexao
        $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e) {
        echo "Num deu boa coisa!!" . $e->getMessage();
    }
?>