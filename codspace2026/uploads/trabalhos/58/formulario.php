<?php  
include 'conexao.php';

ini_set("display_errors",0);
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO formulario (email, cpf, senha)
            VALUES (:email, :cpf, :senha)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms Baguais</title>
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
            background: #a50eeb;
        }

        form{
            width: 300px;
        }

        input{
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <form action="" method="post">

        <label for="email">Email:</label>
        <input type="email" name="email" id="">

        <label for="cpf">CPF</label>
        <input type="number" name="cpf" id="">

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="">

        

        <button type="submit">Entrar</button>
    </form>
</body>
</html>