<?php
    include 'conexao.php';

    $sql = "SELECT * FROM `cadastro`";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

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
        }

        body{
            display: flex;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(to right,#2904cf,#21cca4);
        }

        form{
            width: 450px;
        }

        input, select {
            box-sizing: border-box;
            width: 100%;
            margin-bottom: 20px;
            padding: 5px;
        }

        button {
            background: linear-gradient(to right,blueviolet,#f06c00);
            width: 100%;
            height: 40px;
            border-radius: 10px;
            color: #32a852;
        }

    </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <form action="" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="">

                <label for="nascimento">Data de Nascimento</label>
                <input type="data" name="nascimento" id="">

                <label for="telefone">Telefone</label>
                <input type="number" name="telefone" id="">

                <label for="email">Email</label>
                <input type="email" name="email" id="">

                <button type="submit">Salvar</button>

            </form>
        </div>
    </section>
</body>
</html>