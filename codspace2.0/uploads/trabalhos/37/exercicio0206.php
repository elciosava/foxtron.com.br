<?php
$meunome = "vera santos";

$professor = $_GET["professor"];
$materia = $_GET["materia"];
$cargohorario = $_GET["cargohorario"];
$serie = $_GET["serie"];
$saladeaula = $_GET["saladeaula"];




?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;

        }

        header {
            height: 50px;
            background: lightpink;
            width: 100%;
        }

        form {
            width: 300px;

        }
        input {
            width: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>
</head>

<body>

    <header>
        <?php
        echo "<h2> $meunome </h2>";
        ?>
    </header>

    <div class="formulario">


        <form action="" method="get">
            <label for="professor">professor</label>
            <input type="text" name="professor" id="">

            <label for="materia">materia</label>
            <input type="materia" name="materia" id="">

            <label for="cargohorario">cargohorario</label>
            <input type="cargohorario" name="cargohorario" id="">

            <label for="serie">serie</label>
            <input type="serie" name="serie" id="">

            <label for="saladeaula">saladeaula</label>
            <input type="saladeaula" name="saladeaula" id="">


            <button type="submit">enviar</button>

        </form>
    </div>
    <div class="resultado">
        <?php

        echo "<div class='poduto'><span>professor: </span>$professor</div>";

        echo "<div class='poduto'><span> materia: </span>$materia</div>";

        echo "<div class='poduto'><span>cargohorario: </span>$cargohorario</div>";

        echo "<div class='poduto'><span> serie: </span>$serie</div>";

        echo "<div class='poduto'><span> saladeaula: </span>$saladeaula</div>";



        ?>
    </div>
</body>

</html>