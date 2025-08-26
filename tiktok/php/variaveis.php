<?php
$nome = $_POST["nome"];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="nome" id="">
        <button type="submit">Enviar</button>
    </form>
    <span>Bem vindo <?php echo $nome ?></span>
</body>
</html>