<?php
    session_start();
    include 'conexao.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email_usuario = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$email]);

    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['usuario'] = $user['email_usuario'];

        header("Location: painel.php");
        exit;
    } else {
        header("Location: login.php?erro=1");
        exit;
    }
?>