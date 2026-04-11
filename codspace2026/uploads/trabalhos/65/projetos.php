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

        header {
            background-color: #ff0000;
            height: 50px;
            padding: 5px;
        }

        section {
            display: flex;
            justify-content: space-around;
            height: calc(100vh - 60px);
            padding: 20px;
        }

        .coluna {
            background-color: #0dd4ca;
            height: 450px;
            width: 30%;
        }

    </style>
</head>
<body>
    <header>

    </header>

    <section>
        <div class="coluna">Modelo</div>
        <div class="coluna">Marca</div>
        <div class="coluna">Preço</div>
    </section>
</body>
</html>