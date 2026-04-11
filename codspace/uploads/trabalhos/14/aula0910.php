<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body{
            display:flex;
            flex-direction: column;
            justify-content:center;
            font-family:sans-serif;
        }
    </style>
</head>
<body>
    <section class="usuario">
        <div class="container">
            <form action="gravarusuario.php" method="post">
            <label for="nome">nome</label>
            <input type="text" name="nome" id="">

            <label for="email">email</label>
            <input type="email" name="email" id="">

            <label for="senha">senha</label>
            <input type="password" name="senha" id="">

            <button type="submit">salvar</button>
        </form>
        </div>
    </section>
</body>
</html>