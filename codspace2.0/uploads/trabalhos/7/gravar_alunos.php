<?php
$local = 'localhost';
$banco = 'thomaz';
$usuario = 'root';
$senha = '';

//tentar uam conexao com banco 
try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "num deu conexao, meu truta." . $erro->getMessage();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome_aluno = $_POST['nome_aluno'] ?? null;
    $email_aluno = $_POST['email_aluno'] ?? null;
    $cpf_aluno = ['cpf_aluno'] ?? null;

    $sql = "INSERT INTO alunos(nome_aluno,email_aluno,cpf_aluno)
VALUES (:nome_aluno,:email_aluno,:cpf_aluno)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome_aluno' , $nome_aluno);
    $stmt->bindParam(':email_aluno' , $email_aluno);
    $stmt->bindParam(':cpf_aluno' , $cpf_aluno);
    $stmt->execute();
    header("location:aula1106.php");
} else {
    echo "falha ao inservir alguns registros";
}
