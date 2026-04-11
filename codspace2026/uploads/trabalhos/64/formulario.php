<?php
    ini_set("display_errors",0);
    include 'conexao.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO formulario (email, senha)
            VALUES (:email, :senha)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute(); 


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column  ;
        }
    </style>
</head>
<body>
    <form action="" method="post">

        <label for="email">Email:</label>
        <input type="email" name="email" id="">

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="">

        <button class="submit">Entrar</button>
    </form>
    
</body>
</html>