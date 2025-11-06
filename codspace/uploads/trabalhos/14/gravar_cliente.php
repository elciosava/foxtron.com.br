<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nacimento = $_POST['nacimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO nome (nome, sobrenome, nacimento, telefone, email)
             VALUES (:nome, :sobrenome, :nacimento, :telefone, :email)";

    $stmt = $conexao->prepare($sql);   
    $stmt->bindParam('nome', $nome);
    $stmt->bindParam('sobrenome', $sobrenome);
    $stmt->bindParam('nacimento', $nacimento);
    $stmt->bindParam('telefone', $telefone);
    $stmt->bindParam('email', $email);

    if ($stmt->execute()){
        header("Location:/cadastro_clientes.php");
        exit;
    }else{
        echo "não deu boa!";
    }
}

?>