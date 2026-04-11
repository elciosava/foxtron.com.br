<?php

include 'conexao.php';


    $nome_cliente = $_POST['nome'];
    $email_cliente = $_POST['email'];
    $idade_cliente = $_POST['idade'];
    
    $sql = "INSERT INTO cliente (nome_cliente, email_cliente, idade_cliente)
           VALUES (:nome_cliente, :email_cliente, :idade_cliente)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome_cliente', $nome_cliente);
    $stmt->bindParam(':email_cliente', $email_cliente);
    $stmt->bindParam(':idade_cliente', $idade_cliente);

    $stmt->execute();
    ?>
    


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cliente</title>
</head>
<body>
    
    <form action="" method="post" class="cliente">

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="">

        <label for="email">Email</label>
        <input type="email" name="email" id="">

        <label for="idade">idade</label>
        <input type="date" name="idade" id="">

        <button type="submit">Salvar</button>
    </form>
</body>
</html>