<?php
    ini_set("display_errors", 0);

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display:flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        form {
            width: 300px;
        }

        input, textarea {
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="">
        <label for="email">Email</label>
        <input type="email" name="email" id="">
        <label for="mensagem">Mensagem</label>
        <textarea name="mensagem" id=""></textarea>
        <button type="submit">Enviar</button>
    </form>
    <div>
        <?php
            echo " ".$nome." ".$email." ".$mensagem." ";
        ?>
    </div>
</body>
</html>