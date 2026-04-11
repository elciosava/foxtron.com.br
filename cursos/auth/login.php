<?php
session_start();
if (isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Fundamentos de Programação Web</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/auth.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body class="auth-body">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="logo-icon">ES</div>
                <h2>Bem-vindo de volta!</h2>
                <p>Acesse sua área do curso</p>
            </div>

            <?php if (isset($_SESSION['erro'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['erro']; unset($_SESSION['erro']); ?>
                </div>
            <?php endif; ?>
            
            <?php if (isset($_GET['erro']) && $_GET['erro'] == 'usuario_inexistente'): ?>
                <div class="alert alert-danger">
                    Sua conta não foi encontrada no novo banco de dados. Por favor, crie uma nova conta ou faça login com o admin.
                </div>
            <?php endif; ?>

            <form action="auth_process.php" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required placeholder="seu@email.com">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required placeholder="Sua senha">
                </div>
                <button type="submit" class="btn-primary btn-block">Entrar</button>
            </form>
            
            <div class="auth-footer">
                <p>Ainda não tem conta? <a href="cadastro.php">Crie uma conta grátis</a></p>
                <a href="../../index.php" class="back-link">← Voltar ao site</a>
            </div>
        </div>
    </div>
</body>
</html>
