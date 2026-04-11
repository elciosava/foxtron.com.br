<?php
include 'conexao/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    $sql = "INSERT INTO mensagens (nome, email, assunto, mensagem)
            VALUES (:nome, :email, :assunto, :mensagem)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':assunto', $assunto);
    $stmt->bindParam(':mensagem', $mensagem);

    if ($stmt->execute()) {
        header("Location:../index.php");
        exit;
    } else {
        echo "não deu boa!";
    }
}
?>