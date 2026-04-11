<?php
    $nome= $_POST['nome'];
    $email= $_POST['email'];
    $cpf= $_POST['cpf'];

    echo $nome . "</br>";
    echo $email . "</br>";
    echo $cpf ."</br>";
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
        <form action="" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="">

            <label for="email">Email</label>
            <input type="email" name="email" id="">

            <label for="cpf">Cpf</label>
            <input type="number" name="cpf" id="">

            <button type="submit">enviar</button>
        </form>
    </div>
</body>
</html>