<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
          margin: 0;
          padding: 0;
        }
    </style>
</head>
<body>
    <h2>Cadastrar Peças</h2>

    <form action="gravar_peca.php" method="post">
        <div class="container">
            <label for="nome">Peça 1:</label>
            <input type="text" name="nome" id="">

            <button type="submit">Salvar</button>
        </div>
    </form>
</body>
</html>