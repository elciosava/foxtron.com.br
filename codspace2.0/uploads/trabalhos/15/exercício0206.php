<?php

 $meunome = 'Cadrasto';

    $professor = $_GET['professor'];
    $materia = $_GET['materia'];
    $cargadehorario = $_GET['cargadehorario'];
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
</head>
<body>
    <header>
          <h2><?php echo $meunome ?></h2>
    </header>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        header {
            height: 100px;
            justify-content: center;
            display: flex;
            align-items: center;
            background-color: cadetblue;
        }

        .formulario {
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
        }

        input {
          width: 100%;
        }

        body {
        background: aquamarine;
        }

        form {
            width: 300px;
            padding: 15px;
        }
    </style>

     <div class="formulario">
        <form action="" method="get">
            <label for="professor">Professor</label>
            <input type="text" name="professor" id="">

            <label for="materia">Materia</label>
            <input type="text" name="materia" id="">

            <label for="carga de horaio">Carga De Horario</label>
            <input type="number" name="cargadehorario" id="">

            <label for="código de turma">Código De Turma</label>
            <input type="number" name="codigodeturma" id="">

            <label for="serie">Série</label>
            <input type="text" name="serie" id="">

            <label for="código de turma">Sala De Aula</label>
            <input type="text" name="saladeaula" id="">



            <button type="submit">Enviar</button>
        </form>
        
    <div class="resultado">
        <?php
            
            echo "<div class='produto'><span>Professor: </span>$professor</div>";
            echo "<div class='produto'><span>Materia: </span>$materia</div>";
            echo "<div class='produto'><span>Carga De Horario: </span>$cargadehorario</div>";
            echo "<div class='produto'><span>Codigo De Turma: </span>$codigodeturma</div>";
            echo "<div class='produto'><span>Serie: </span>$serie</div>";
            echo "<div class='produto'><span>Sala De Aula: </span>$saladeaula</div>";
            ?>
            </div>
    </div>   
    
    
</body>
</html>