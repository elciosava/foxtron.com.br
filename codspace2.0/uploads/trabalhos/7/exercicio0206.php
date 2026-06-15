<?php
$professor = $_GET['professor'];
$materia = $_GET['materia'];
$cargahoraria = $_GET['cargahoraria'];
$codigodeturma = $_GET['codigodeturma'];
$serie = $_GET['serie'];
$saladeaula = $_GET['saladeaula'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            justify-content: center;
            align-items: center;
            display: flex;

        }

        header {
            display: flex;
            height: 50px;

            flex-direction: column;
        }

        input {
            width: 100%;
        }

        form {

            width: 450px;
        }

        body {
            display: flex;
            background-color: burlywood;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .resultado {
            width: 450px;
        }
    </style>
</head>

<body>
    <header>
        <h2> cadastro do aluno</h2>
    </header>

    <?php

    ?>
    <div class="container">
        <form action="" method="get">

            <label for="professor">professor</label>
            <input type="text" name="professor" id="">

            <label for="materia">materia</label>
            <input type="text" name="materia" id="">

            <label for="cargahoraria">cargahoraria</label>
            <input type="text" name="cargahoraria" id="">

            <label for="codigodeturma">codigodaturma</label>
            <input type="text" name="codigodeturma" id="">

            <label for="serie">serie</label>
            <input type="text" name="serie" id="">

            <label for="saladeaula">saladeaula</label>
            <input type="text" name="saladeaula" id="">

            <button type="submit">enviar</button>
        </form>
    </div>
    <div class="resultado">
        <?php
        echo "<div class='professor'><span> professor: </span>$professor</div>";
        echo "<div class='materia'><span> materia: </span>$materia</div>";
        echo "<div class='cargahoraria'><span> cargahoharia: </span>$cargahoraria</div>";
        echo "<div class='codigodeturma'><span> serie: </span>$codigodeturma</div>";
        echo "<div class='serie'><span> serie: </span>$serie</div>";
        echo "<div class='saladeaula'><span> saladeaula: </span>$saladeaula</div>";




        ?>
    </div>


</body>

</html>