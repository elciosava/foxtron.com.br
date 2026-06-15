<?php
$nome = $_GET['nome'];
$materia = $_GET['materia'];
$nota1 = $_GET['nota1'];
$nota2 = $_GET['nota2'];
$nota3 = $_GET['nota3'];
$nota4 = $_GET['nota4'];



$media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            margin: 0px;
            padding: 0px;
        }


        body {
            background-color: beige;

        }

        header {
            background-color: bisque;
            padding: 20px;
            justify-items: center;

        }


        .container {
            display: flex;
            background-color: antiquewhite;
            align-items: center;
            flex-direction: column;
        }

        form {
            width: 350px;

        }

        input {
            width: 100%;
        }
    </style>

</head>

<body>

    <header>
        <h1>Materia e Media</h1>
    </header>


    <div class="container">
        <form action="" method="get">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="materia">Materia</label>
            <input type="text" name="materia" id="">

            <label for="nota1">Nota Final B1</label>
            <input type="number" name="nota1" id="">

            <label for="nota2">Nota Final B2</label>
            <input type="number" name="nota2" id="">

            <label for="nota3">Nota Final B3</label>
            <input type="number" name="nota3" id="">

            <label for="nota4">Nota Final B4</label>
            <input type="number" name="nota4" id="">


            <button type="submit">Enviar</button>
        </form>

        <div class="resultado">
            <?php
            echo "<div class='nome'>$nome</div>";

            echo "<div class='materia'>$materia</div>";

            echo "<div class='media'>$media</div>";

            ?>
        </div>
    </div>

</body>

</html>