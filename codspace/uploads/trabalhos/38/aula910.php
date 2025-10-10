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
        }
        .container{
            width: 300px;
        }

        input {
            width: 100%;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #999999;
        }
    </style>
</head>

<body>
    <section class="usuario">
        <div class="container">
            <form action="" method="post">

                <label for="nome">nome</label>
                <input type="text" name="nome" id="">

                <label for="email">senha</label>
                <input type="email" name="email" id="">

                <label for="senha">nome</label>
                <input type="passworld" name="senha" id="">
                
                <button type="submit">salvar</button>
            </form>

        </div>
    </section>
</body>

</html>