<?php

//4 variaveis que sao padrao
$local = 'localhost' ;
$banco = 'henzo' ;
$usuario = 'root' ;
$senha = '' ;

//tentar uma conexao com banco
try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $erro){


 echo "Num deu conexao, meu truta." . $erro->getMessage();
}

//termino da parte de conexao com banco de dados

//inicio da parte do select da nossa tabela

$sql_select = "SELECT * FROM `clientes`";
$stmt_select = $conexao->prepare($sql_select);
$stmt_select ->execute();

while ($clientes=$stmt_select->fetch(PDO::FETCH_ASSOC)){
    echo $clientes['nome_cliente'] ."<br>";
}

while ($clientes=$stmt_select->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>"
    echo "<tr>{$cliente['nome_cliente']}</td><td>{$clientes['email_cliente']}</td><td>
}