<?php
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
            background: white;
            display: flex;
            align-items: center;
            flex-direction: column;
        }


        form {
            background: whitesmoke;
            width: 350px;
            padding: 20px;
            margin: auto;
        }

            .resultado {
                width: 350px;
                padding: 20px;
            }

        input {
            width: 100%;
            margin-bottom: 10px;
            height: 20px;
        }
        
        .formulario {
            display: flex;
            justify-content: center;
        }

        .header{
            display: flex;
            justify-content: center;
            background: grey;
            width: 100%;
        }
            
    </style>
</head>
<body>
    <header>
       <h2>Cadastro de aulas</h2>
    </header>
    <div class="formulario">
        <form action="" method="get">
            <label for="professor">Professor:</label>
            <input type="text" name="professor" id="">

            <label for="materia">Materia:</label>
            <input type="text" name="materia" id="">

            <label for="horaria">Carga horária:</label>
            <input type="number" name="horaria" id="">

            <label for="codigo">Codigo da turma:</label>
            <input type="number" name="Codigo" id="">

            <label for="serie">Serie:</label>
            <input type="text" name="serie" id="">

            <label for="sala">Sala de aula:</label>
            <input type="text" name="sala" id="">
            <button type="submit">Enviar</button>
          </form>
        </div>

         <div class="resultado">
        <?php 
            echo "<div class='produto'><span>professor: </span>$professor</div>";
            echo "<div class='produto'><span>materia: </span>$materia</div>";
            echo "<div class='produto'><span>horaria: </span>$horaria</div>";
            echo "<div class='produto'><span>codigo: </span>$codigo</div>";
            echo "<div class='produto'><span>serie: </span>$serie</div>";
            echo "<div class='produto'><span>sala: </span>$sala</div>";
        ?>
</body>
</html>