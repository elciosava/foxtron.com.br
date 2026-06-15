<?php

  //4 variaveis que sao padrao
  $local ='localhost';
  $banco = 'lara';
  $usuario = 'root';
  $senha = '';

//tentar uma conexao com banco
try{
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $erro){
    echo "num deu conexão, meu truta.". $erro->getMessage();}


if($_SERVER['REQUEST_METHOD'] === 'POST') {
$nome_cliente = $_POST['nome_aluno'] ?? null;
$email_cliente = $_POST['email_aluno'] ?? null;
$senha_cliente = $_POST['cpf_aluno'] ?? null;

$sql = "INSERT INTO clientes (nome_cliente, email_cliente,senha_cliente)
        VALUES (:nome_cliente, :email_cliente, :senha_cliente)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindparam(':nome_cliente', $nome_cliente);
        $stmt->bindparam(':email_cliente', $email_cliente);
        $stmt->bindparam(':senha_cliente', $senha_cliente);
        $stmt->execute();

        header("location:exercico0906.php");
}else{
    echo "falha ao inserir alguns registros";
}
    
