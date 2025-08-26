<?php
require 'conexao/conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$nome, $email, $senha]);
        echo "Cadastro realizado com sucesso! <a href='login.php'>Login</a>";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Document</title>
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
                <li><a href="login.php" class="botao"><span>Entrar</span></a></li>
            </ul>
        </nav>
    </header>
    <section id="cadastro">
        <div class="container">
            <form method="POST">
                <h2>Cadastro</h2>
                <span>Nome:</span><input type="text" name="nome" required>
                <span>Email:</span><input type="email" name="email" required>
                <span>Senha:</span><input type="password" name="senha" required>
                <button type="submit" class="botao">Cadastrar</button>
            </form>
        </div>
    </section>
</body>

</html>