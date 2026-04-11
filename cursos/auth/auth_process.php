<?php
session_start();
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    if (empty($email) || empty($senha)) {
        $_SESSION['erro'] = "Preencha todos os campos.";
        header("Location: login.php");
        exit;
    }

    try {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        // Debug: Log para verificar o que está sendo comparado (Remover em produção)
        // error_log("Email: $email | Senha Pura: $senha | Hash DB: " . $usuario['senha']);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_nivel'] = $usuario['nivel'];

            header("Location: ../index.php"); // Redireciona para a página principal do curso
            exit;
        } else {
            $_SESSION['erro'] = "E-mail ou senha incorretos.";
            header("Location: login.php");
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['erro'] = "Erro no sistema. Tente novamente mais tarde.";
        header("Location: login.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>
