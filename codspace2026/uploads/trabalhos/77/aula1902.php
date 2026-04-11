<?php
    $numero1 = $_GET['numero1'];
    $numero2 = $_GET['numero2'];

    $soma = $numero1 + $numero2;
    echo $soma;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        section {
            padding: 10px 0 10px 30px;
            background: rgba(172, 130, 235, 0.57);
            color: rgba(75, 0, 94, 1);
        }
    </style>
</head>
<body>
    <section id="formulario">
        <form action="" method="get">
            <label for="numero1">Número 1</label>
            <input type="text" name="numero1" id="">

            <label for="numero2">Número 2</label>
            <input type="text" name="numero2" id="">

            <button type="submit">Enviar</button>
        </form>
    </section>
</body>
</html>