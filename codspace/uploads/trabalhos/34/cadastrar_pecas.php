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
        <div class="container">

            <form action="gravar_pecas.php" method="post">
                <label for="nome">Matéria-Prima</label>
                <input type="text" name="nome" id="">

                <button type="submit">Salvar</button>
            </form>
        </div>

</body>
</html>