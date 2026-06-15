<?php
    $email = $_GET['email'];
    $nome = $_GET['nome'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="get">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="email">Email</label>
            <input type="email" name="email" id="">

            <button type="submit">Enviar</button>
        </form>
    </div>
    <div class="resultado">
        <?php
        echo "<div class='nome'>$nome</div>";

        echo "<div class='email'>$email</div>";
        ?>
    </div>
</body>
</html>