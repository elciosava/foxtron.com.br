<?php
// 4 variaveis que sao padrao
$local = 'localhost';
$banco = 'vitoria';
$usuario = 'root';
$senha = '';

// tentar uma conexao com banco
try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $erro){
    echo "Num deu conexão, meu truta." . $erro->getMessage();
}
if ($_SERVER['REQUEST_METHOD'] ==='POST'){
    $nome_cliente = $_POST['nome_cliente'] ?? null;
    $email_cliente = $_POST['email_cliente'] ?? null;
    $senha_cliente = $_POST['senha_cliente'] ?? null;

    $sql = "INSERT INTO clientes (nome_cliente,email_cliente,senha_cliente)
    VALUES (:nome_cliente, :email_cliente, : senha_cliente)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome_cliente', $nome_cliente);
    $stmt->bindParam(':email_cliente', $email_cliente);
    $stmt->bindParam(':senha_cliente', $senha_cliente);
    $stmt->execute();

    Header("Location:exercicio0906.php");
    }

    else {
        echo "Falha ao inserir alguns registros";
    }
    