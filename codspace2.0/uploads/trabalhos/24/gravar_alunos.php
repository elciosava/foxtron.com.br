<?php

$local = 'localhost';
    $banco ='aluno';
    $usuario = 'root';
    $CPF = '';

    try {
        $conexao = new PDO ("mysql:host=$local;dbname=$banco;",$usuario,$CPF);
        $conexao-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $erro) {
        echo "Num deu conexão, meu truta.". $erro->getMessage();
    }
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

$nome_aluno = $_POST['nome_aluno'] ?? null;
$email_aluno = $_POST ['email_aluno'] ?? null;
$CPF_aluno = $_POST['CPF_aluno'] ?? null;

$sql =  "INSERT INTO alunos (nome_aluno,email_aluno,CPF_aluno)
        VALUES (:nome_aluno, :email_aluno, :CPF_aluno)";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':nome_aluno', $nome_aluno);

$stmt->bindParam(':email_aluno', $email_aluno);

$stmt->bindParam(':CPF_aluno', $CPF_aluno);

$stmt->execute();

Header("Location:exercicio0906.php");
}else{
    echo "Falha ao entrar no cliente.";
}