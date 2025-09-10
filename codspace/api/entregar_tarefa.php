<?php
session_start();

// Verifica login
if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_tipo"] != "aluno") {
    header("Location: index.php");
    exit;
}

$nome = $_SESSION["usuario_nome"];

// Conexão com o banco
include '../conexao/conexao.php';

$id_tarefa = $_POST['id_tarefa'];
$id_aluno = $_SESSION['usuario_id'];
$resposta = $_POST['resposta'] ?? '';
$arquivo = null;

// Upload do arquivo
if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === 0) {
    $nome_arquivo = time() . "_" . $_FILES['arquivo']['name'];
    move_uploaded_file($_FILES['arquivo']['tmp_name'], "../uploads/" . $nome_arquivo);
    $arquivo = $nome_arquivo;
}

// Salva no banco
$stmt = $pdo->prepare("INSERT INTO entregas (id_tarefa, id_aluno, resposta, arquivo) VALUES (?, ?, ?, ?)");
$stmt->execute([$id_tarefa, $id_aluno, $resposta, $arquivo]);

header("Location: ../paginas/dashboard_aluno.php");
exit;
?>
