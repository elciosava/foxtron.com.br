<?php
    ini_set("display_errors",0);
    
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sono do djuabo</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="">

            <label for="assunto">Assunto:</label>
            <input type="text" name="assunto" id="">

            <label for="mensagem">Mensagem:</label>
            <textarea name="mensagem" id="">

            </textarea>

            <button type="submit">Enviar</button>
        </form>
    </div>

    <div class="resultado">
        <?php
            echo $email . "</br>";
            echo $assunto . "</br>";
            echo $mensagem . "</br>";
        ?>
    </div>

</body>
</html>