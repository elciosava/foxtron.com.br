<?php
    $nome = $_POST['nome'];


    $sql = "INSERT INTO......"
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        form {
            width: 300px;
            margin-top: 30px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            font-size: 1.2rem;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

    </style>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="">
        <label for="rua">Rua</label>
        <input type="text" name="rua" id="">
        <label for="cidade">Cidade</label>
        <input type="text" name="cidade" id="">
        <label for="estado">Estado</label>
        <select name="estado" id="">
            <option value="PR">PR</option>
            <option value="SC">SC</option>
            <option value="RS">RS</option>
        </select>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>