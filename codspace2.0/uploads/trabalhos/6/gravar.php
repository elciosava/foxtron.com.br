<?php 

$local = 'localhost';
$banco = 'lipe';
$usuario = 'root';
$senha = '';

try {
 $conexao = new PDO("mysql:host=$local;dbname=$banco;", $usuario, $senha);
    $conexao->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $erro){
    echo "vai da não." . $erro->getmessage();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_aluno = $_POST['nome_aluno'] ?? null;
    $email_aluno = $_POST['email_aluno'] ?? null;
    $cpf_aluno = $_POST ['cpf_aluno'] ?? null;

    $sql = "INSERT INTO alunos (nome_aluno,email_aluno,cpf_aluno)
            values (:nome_aluno, :email_aluno, :cpf_aluno)";
            
$smtm = $conexao->prepare($sql);
$smtm->bindParam(':nome_aluno', $nome_aluno);
$smtm->bindParam(':email_aluno', $email_aluno);
$smtm->bindParam(':cpf_aluno', $cpf_aluno);
$smtm->execute();

header("location:aula1106.php");
}else{
    echo "falha ao inserir algum registro";
}

