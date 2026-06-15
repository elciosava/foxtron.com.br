<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagem/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>CodSpace | Login</title>
</head>

<body>
    <header class="hero">
        <div class="logo-container">
            <img src="imagem/codespace-logo.png" alt="CodSpace">
            <div>
                <h1 style="font-size: 1.5rem; color: var(--primary);">CodSpace</h1>
                <p style="font-size: 0.875rem; color: var(--text-muted);">Programe sua própria identidade</p>
            </div>
        </div>
    </header>

    <main class="container-center">
        <div class="auth-card">
            <div class="auth-tabs">
                <button class="tab-btn active" data-target="login-form">ENTRAR</button>
                <button class="tab-btn" data-target="register-form">CADASTRAR</button>
            </div>

            <div class="auth-content">
                <!-- LOGIN -->
                <div id="login-form" class="form-container">
                    <form action="api/login.php" method="POST">
                        <div class="form-group">
                            <label for="email_login">E-MAIL</label>
                            <input type="email" id="email_login" name="email" placeholder="seu@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="senha_login">SENHA</label>
                            <input type="password" id="senha_login" name="senha" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn btn-primary">ENTRAR</button>
                    </form>
                    <div style="text-align: center; margin-top: 1.5rem;">
                        <a href="#" style="color: var(--primary); font-size: 0.875rem; text-decoration: none;">Esqueceu a senha?</a>
                    </div>
                </div>

                <!-- CADASTRO -->
                <div id="register-form" class="form-container" style="display: none;">
                    <form action="api/cadastrar_usuario.php" method="POST">
                        <div class="form-group">
                            <label for="nome_register">NOME COMPLETO</label>
                            <input type="text" id="nome_register" name="nome" placeholder="Seu nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email_register">E-MAIL</label>
                            <input type="email" id="email_register" name="email" placeholder="seu@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="senha_register">SENHA</label>
                            <input type="password" id="senha_register" name="senha" placeholder="Mínimo 6 caracteres" required>
                        </div>
                        <button type="submit" class="btn btn-primary">CRIAR CONTA</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 CodSpace. Desenvolvido para mentes criativas.</p>
    </footer>

    <script src="js/app.js"></script>
</body>

</html>
