<?php
//4 variaveis que sao padrao
$local = 'localhost' ;
$banco = 'joani' ;
$usuario = 'root' ;
$senha = '';

//tentar uma conexao com banco
try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $erro){
    echo "num deu" . $erro->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_aluno = $_POST['nome_aluno'] ?? null;
    $email_aluno = $_POST['email_aluno'] ?? null;
    $cpf_aluno = $_POST['cpf_aluno'] ?? null;

    $sql = "INSERT INTO aluno (nome_aluno,email_aluno,cpf_aluno)
            VALUES (:nome_aluno, :email_aluno, :cpf_aluno)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome_aluno', $nome_aluno);
    $stmt->bindParam(':email_aluno', $email_aluno);
    $stmt->bindParam(':cpf_aluno', $cpf_aluno);
    $stmt->execute();

    Header("Location:exercicio1106.php");
    } else{
        echo "Falaha ao inserir alguns registros";
    } 
