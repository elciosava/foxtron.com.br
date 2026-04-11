<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        form {
            width: 250px;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <form action="verifica_login.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="">

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="">

        <button type="submit">Entrar</button>
    </form>
</body>
</html>