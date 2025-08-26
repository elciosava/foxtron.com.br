<?php
require 'conexao/conexao.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario'] = $usuario;
        header("Location: painel-aluno.php");
        exit;
    } else {
        echo "Email ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Login</title>
</head>

<body>
    <div class="bolhas">
        <div class="bolha"></div>
        <div class="bolha"></div>
        <div class="bolha"></div>
        <div class="bolha"></div>
        <div class="bolha"></div>
    </div>

    <header class="navbar">
        <img src="../imagem/graduation_school.svg" alt="logo">
        <nav>
            <ul>
                <li><a href="cadastro.php" class="botao"><span>Criar conta</span></a></li>
            </ul>
        </nav>
    </header>
    <section id="cadastro">
        <div class="container">
            <form method="POST">
                <h2>Login</h2>
                <span>Email:</span><input type="email" name="email" required><br>
                <span>Senha:</span><input type="password" name="senha" required><br>
                <button type="submit" class="botao">Entrar</button>
            </form>
        </div>
    </section>
</body>

</html>