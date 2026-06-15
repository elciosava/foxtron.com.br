<?php
    $meunome = 'joao';

    $professor = $_GET['professor'];
    $materia = $_GET['materia'];
    $horario = $_GET['horario'];
    $turma = $_GET['turma'];
    $serie = $_GET['serie'];
    $sala = $_GET['sala'];
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
        .formulario {
            background-color: aqua;
            flex-direction: column;
            align-items: center;
            display: flex;



        }

        header {
            background-color: aqua;
            padding: 20px;
            justify-items: center;
        }
        form {
            width: 350px;

        }
        input {
            width: 100%;
        }
        body {
            background-color: aquamarine;
        }
    </style>
</head>
<body>
    <header>
        <h2>
        <?php
          echo "<h2>$meunome<h2>";
        ?>
    </header>
    <div class="formulario">
        <form action="" method="get">
            <lebel for="professor">Professor</lebel>
            <input type="text" name="professor" id="">

            <label for="materia">Materia</label>
            <input type="text'" name="materia" id="">

            <label for="horario">Horario</label>
            <input type="number" name="horario" id="">

            <lebel for="turma">Codigo da turma</lebel>
            <input type="text" name="turma" id="">

            <lebel for="serie">Serie</lebel>
            <input type="number" name="serie" id="">

            <lebel for="sala">Sala</lebel>
            <input type="number" name="sala" id="">


            <button type="submit">Enviar</button>
        </form>

            <div class="resultado">
        <?php
           echo "<div class='produto'><span>professor: </span>$professor</div>";
           echo "<div class='produto'><span>materia: </span>$materia</div>";
           echo "<div class='produto'><span>horario: </span>$horario</div>";
           echo "<div class='produto'><span>turma: </span>$turma</div>";
           echo "<div class='produto'><span>serie: </span>$serie</div>";
           echo "<div class='produto'><span>sala: </span>$sala</div>";
        ?>
        </div>
    </div>


</body>
</html>