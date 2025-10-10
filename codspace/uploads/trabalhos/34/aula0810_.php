<?php
$local = 'localhost';
$banco = 'senai';
$usuario = 'root';
$senha = '';

try{
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM usuario';

    $stmt = $conexao ->prepare($sql);

    $stmt->execute();

    $usuario = $stmt->fetchALL(PDO::FETCH_ASSOC);
}catch (PDOException $e){
        echo ('nao deu');
        
    
}


?>
