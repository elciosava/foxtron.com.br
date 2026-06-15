<?php
$local = 'localhost';
$banco = 'farias';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $erro){
    echo "não rolou!". $erro->getMessage();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome_cliente = $_POST['nome_cliente']??null;
    $email_cliente = $_POST['email_cliente']??null;

    $sql = "INSERT INTO clientes (nome_cliente, email_cliente)
    VALUES(:nome_cliente, :email_cliente)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome_cliente', $nome_cliente);
    $stmt->bindParam(':email_cliente', $email_cliente);
    $stmt->execute();
}else{
    echo "falha ao inserir o registro";
}

header("Location:aula0206.php");