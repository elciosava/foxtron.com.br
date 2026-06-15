<?php
    $meunome = 'Elcio Sava';

    $professor = $_GET['professor'];
    $materia = $_GET['materia'];
    $horaria = $_GET['horaria'];
    $codigo = $_GET['codigo'];
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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .formulario {
            display: flex;
            justify-content: center;
            align-self: center;
            flex-direction: column;
        }

        form {
            width: 290px;
            padding: 10px;
        }

        input {
            width: 100%;
        }

        .resultado {
            width: 290px;
            padding: 10px;
        }

        .produto {
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h2><?php echo $meunome ?></h2>
    </header>
    <div class="formulario">
        <form action="" method="get">
            <label for="professor">Professor</label>
            <input type="text" name="professor" id="">
            
            <label for="materia">Materia</label>
            <input type="text" name="materia" id="">

            <label for="horaria">Carga Horaria</label>
            <input type="number" name="horaria" id="">

            <label for="codigo">Codigo Turma</label>
            <input type="number" name="codigo" id="">

            <label for="serie">Serie</label>
            <input type="number" name="serie" id="">

            <label for="sala">Sala</label>
            <input type="number" name="sala" id="">

            <button type="submit">Enviar</button>
        </form>
    </div>

    <div class="resultado">
        <?php
            echo "<div class='produto'><span>Professor: </span>$professor</div>";
            echo "<div class='produto'><span>Materia: </span>$materia</div>";
            echo "<div class='produto'><span>Carga Horaria: </span>$horaria</div>";
            echo "<div class='produto'><span>Codigo Turma: </span>$codigo</div>";
            echo "<div class='produto'><span>Serie: </span>$serie</div>";
            echo "<div class='produto'><span>Sala de aula: </span>$sala</div>";
        ?>
    </div>
</body>
</html>