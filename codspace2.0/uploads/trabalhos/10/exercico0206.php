<?php
    $professor = $_GET['professor'];
    $materia = $_GET['materia'];
    $cargahoraria = $_GET['cargahoraria'];
    $codigodaturma = $_GET['codigodaturma'];
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
        *{
            margin: 0;
            padding: 0;
        }

        header{
            display: flex;
            align-items: center;
            justify-content: center;
            background: lightslategray;
            height: 50px;
        }

        input{
            width: 100%;
        }

        form{
            width: 300px;
            padding: 15px;
        }

        .formulario{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        body{
            background: gainsboro;
        }
    </style>
</head>
<body>
    <header>
    <h2>Cadastro</h2>
    </header>
    <div class="formulario">
        <form action="" method="get">
            <label for="professor">Professor</label>
            <input type="text" name="professor" id="">

            <label for="materia">Materia</label>
            <input type="text" name="materia" id="">

            <label for="carga horaria">Carga horaria</label>
            <input type="number" name="cargahoraria" id="">

            <label for="codigo da turma">Codigo da turma </label>
            <input type="number" name="codigodaturma" id="">

            <label for="serie">Serie</label>
            <input type="number" name="serie" id="">

            <label for="sala">Sala de aula</label>
            <input type="number" name="saladeaula" id="">

            <button type="submit">Enviar</button>
        </form>
          <div class="resultado">
        <?php 
           echo "<div class='professor'><span>Professor: $professor</div>";
           echo "<div class='materia'><span>Materia: $materia</div>";
           echo "<div class='carga horaria'><span>Carga horaria: $cargahoraria</div>";
           echo "<div class='serie'><span>Codigo da turma: $codigodaturma</div>";
           echo "<div class=''><span>Serie: $serie</div>";
           echo "<div class='professor'><span>Sala de aula: $saladeaula</div>";
        ?>
    </div>
  </div>
</body>
</html>