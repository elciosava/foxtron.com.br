<?php

?>

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

        html {
            font-family: Segoe UI;
            background:lightblue;
        }  

        header {
            height:60px;  
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 4fr;
            gap: 5px;          
        }

        form {
            width: 400px;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 3px;
        }
    </style>
</head>
<header>

</header>
<body>
    <section class="usuario">
        <div class="container">
        <form action="gravarusuario.php" method="post">

        <label for="usuario">Nome</label>
        <input type="text" name="nome" id="">

        <label for="email">Email</label>
        <input type="email" name="email" id="">

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="">  

        <button class="submit">Salvar</button>

        </form>
        </div>
        </section>
</body>
</html>