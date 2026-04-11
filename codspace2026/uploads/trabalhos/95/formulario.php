<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $pedido = $_POST["pedido"];

    $sql = "INSERT INTO pedidos (nome, sobrenome, pedido) 
            VALUES ('$nome', '$sobrenome', '$pedido')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados salvos com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        header{
            height: 60px;
            padding:10px 30px;
            box-shadow: 0 1px 20px gray;
            display: flex;
            align-items: space-between;
            width: 100%;
        }
        
        form {
            width:300px;
            margin-top:30px;
        }

        input {
            width: 100%;
            padding: 8px;
            font-size: 1rem;
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

<form action="" method="post">
    <label>Nome</label>
    <input type="text" name="nome" required>

    <label>Sobrenome</label>
    <input type="text" name="sobrenome" required>

    <label>Pedido</label>
    <input type="text" name="pedido" required>

    <button type="submit">Enviar</button>
</form>

</body>
</html>

