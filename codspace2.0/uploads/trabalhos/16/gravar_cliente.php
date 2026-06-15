<?php

//4 variantes que sao padrao
$local = 'localhost';
$banco = 'diogo';
$usuario = 'root';
$senha = '';

//tentar uma conexao com banco
try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "num deu conexao, meu truta." . $erro->getmessage();
    }
if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
$nome_cliente = $_POST ['nome_cliente']?? null;
$email_cliente = $_POST ['email_cliente']?? null;
$senha_cliente = $_POST ['senha_cliente']?? null;
$sql = "INSERT INTO cliente (nome_cliente, email_cliente, senha_cliente)
        VALUES (:nome_cliente, :email_cliente, :senha_cliente)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome_cliente', $nome_cliente);
        $stmt->bindParam(':senha_cliente', $senha_cliente);
        $stmt->bindParam(':email_cliente', $email_cliente);
        $stmt->execute();

        header("Location:exercicio0906.php");
}else {
    echo "falha ao inserir alguns registros";
}


 
