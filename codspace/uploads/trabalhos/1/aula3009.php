<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        header {
            height: 50px;
            padding: 10px;
            background: rgb(155,125,38);
        }

        .inicio {
            background: rgb(255,255,22);
            height: calc(100vh - 70px);
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 10px;
        }

        .coluna {
            height: calc(100vh - 70px);
            background: rgb(155,155,155);
        }
    </style>
</head>
<body>
    <header>
        <h2>Elcio Sava</h2>
    </header>

    <section class="inicio">

        <div class="container">
            <div class="coluna"></div>
            <div class="coluna"></div>
        </div>

    </section>
</body>
</html>