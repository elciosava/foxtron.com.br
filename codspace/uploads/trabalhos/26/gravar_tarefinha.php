<?php

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];


    $sql = "INSERT INTO cadastro (nome, sobrenome, nascimento, telefone, email)
            VALUES (:nome, :sobrenome, :nascimento, :telefone, :email)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sobrenome', $sobrenome);
    $stmt->bindParam(':nascimento', $nascimento);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()){
        header("Location:cadastrar_produto.php");
        exit;
    }else{
        echo "Registro não existente";
    }
}

?>