<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagem/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/pc.css">
    <link rel="stylesheet" href="css/mobile.css">
    <title>CodSpace</title>
</head>

<body>
    <header class="hero">
        <img src="imagem/codespace-logo.png" alt="CodSpace">
        <div>
            <h1>Bem-vindo ao CodSpace</h1>
            <p>Programe sua própria identidade</p>    
        </div>
    </header>

    <section class="login">
        <div class="login-box">
            <div class="tab-header">
                <div class="tab-item active" data-tab-target="#login-form">LOGIN</div>
                <div class="tab-item" data-tab-target="#register-form">CADASTRAR</div>
            </div>

            <div class="tab-content">
                <!-- LOGIN -->
                <div id="login-form" class="form-container active">
                    <form action="api/login.php" method="POST">
                        <div class="form-group">
                            <label for="email_login">E-MAIL*</label>
                            <input type="email" id="email_login" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="senha_login">SENHA*</label>
                            <input type="password" id="senha_login" name="senha" required>
                        </div>
                        <button type="submit">ENTRAR</button>
                    </form>
                    <div class="forgot">
                        Esqueceu a senha? <a href="#">Clique aqui</a>
                    </div>
                </div>

                <!-- CADASTRO -->
                <div id="register-form" class="form-container">
                    <form action="api/cadastrar_usuario.php" method="POST">
                        <div class="form-group">
                            <label for="nome_register">NOME COMPLETO*</label>
                            <input type="text" id="nome_register" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email_register">E-MAIL*</label>
                            <input type="email" id="email_register" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="senha_register">SENHA*</label>
                            <input type="password" id="senha_register" name="senha" required>
                        </div>
                        <button type="submit">CADASTRAR</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2025 CodSpace</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabItems = document.querySelectorAll('.tab-item');
            const formContainers = document.querySelectorAll('.form-container');

            tabItems.forEach(item => {
                item.addEventListener('click', () => {
                    tabItems.forEach(t => t.classList.remove('active'));
                    formContainers.forEach(f => f.classList.remove('active'));

                    item.classList.add('active');

                    const targetFormId = item.getAttribute('data-tab-target');
                    document.querySelector(targetFormId).classList.add('active');
                });
            });
        });
    </script>
</body>

</html>