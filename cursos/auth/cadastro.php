<?php
session_start();
require_once '../includes/db.php';

if (isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, nivel) VALUES (?, ?, ?, 'aluno')");
        $stmt->execute([$nome, $email, $senha]);
        
        $usuario_id = $pdo->lastInsertId();
        
        // Criar matrícula pendente inicial
        $stmt = $pdo->prepare("INSERT INTO matriculas (usuario_id, curso_id, status) VALUES (?, 1, 'pendente')");
        $stmt->execute([$usuario_id]);

        $_SESSION['usuario_id'] = $usuario_id;
        $_SESSION['usuario_nome'] = $nome;
        $_SESSION['usuario_nivel'] = 'aluno';

        header("Location: ../vendas.php");
        exit;
    } catch (PDOException $e) {
        $erro = "E-mail já cadastrado ou erro no sistema.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Conta | Fundamentos Web</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/auth.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body class="auth-body">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="logo-icon">ES</div>
                <h2>Crie sua conta</h2>
                <p>Comece sua jornada hoje</p>
            </div>

            <?php if (isset($erro)): ?>
                <div class="alert alert-danger"><?php echo $erro; ?></div>
            <?php endif; ?>

            <form method="POST" class="auth-form">
                <div class="form-group">
                    <label>Nome Completo</label>
                    <input type="text" name="nome" required placeholder="Seu nome">
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" required placeholder="seu@email.com">
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" required placeholder="Crie uma senha">
                </div>
                <button type="submit" class="btn-primary btn-block">Criar Conta e Ver Preço</button>
            </form>
            
            <div class="auth-footer">
                <p>Já tem conta? <a href="login.php">Fazer Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>
