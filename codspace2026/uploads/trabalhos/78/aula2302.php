<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];

echo $nome;
echo $email;
echo $cpf;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 23/02</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" type="imagex/png" href="img/icon.png">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="email">Email</label>
            <input type="email" name="email" id="">

            <label for="cpf">CPF</label>
            <input type="number" name="cpf" id="">

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>