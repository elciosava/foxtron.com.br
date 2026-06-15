<?php

use function PHPSTORM_META\sql_injection_subst;

if($_SERVER['REQUEST_METHOD']==='POST'){

$nome_cliente = $_POST ['nome_cliente'] ?? null;
$nome_cliente = $_POST ['imail_cliente'] ?? null;
$nome_cliente = $_POST ['enha_cliente']?? null;


$sql = "INSERT INTO clientes(nome_cliente,imail_cliente,senha_cliente)
VALUES ( : nome_cliente ,:email_cliente.:senha_cliente)";

$stmt=$conexao->prepare($sql);
$stmt->bindParam (nome _cli$sql)
}

