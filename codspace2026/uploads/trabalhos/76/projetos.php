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

        header {
            background: #559900;
            height: 50px;
            padding:5px;
        }

        section {
            display: flex;
            justify-content: space-around;
            height: calc(100vh - 60px);
            padding: 20px;
        }

        .coluna {
            background: orange;
            height: 450px;
            width: 30%;
        }
    </style>
</head>
<body>
    <header>

    </header>

    <section id="inicio">
        <div class="coluna"></div>
        <div class="coluna"></div>
        <div class="coluna"></div>
    </section>
</body>
</html>