<?php
    $meunome = 'Adrian sokoleki';

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
            background-color: lightslategray;
        }
        form {
            width: 400px;
            padding: 10px;
    
        }
        input{
            width: 100%;
        }

        .formulario{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        }

        .resultado{
            width: 400px;
            padding: 10px;
        }

        .produto{
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <header>
    <h2><?php echo $meunome?></h2>


    </header>

    <div class="formulario">
        <form action="" method="get">
        <label for="profesor">professor</label>
        <input type="text" name="professor" id="">

        <label for="materia">Materia</label>
        <input type="text" name="materia" id="">
        
        <label for="carga horaria">Carga horaria</label>
        <input type="text" name="cargahoraria" id="">

        <label for="código da turma ">Codigo da turma</label>
        <input type="text" name="codigodeturma" id="">

        <label for="serie">Serie</label>
        <input type="text" name="serie" id="">

        <label for="sala de aula ">Sala de aula</label>
        <input type="text" name="saladeaula" id="">


        <button type="submit">Enviar</button>

        <div class="resultados">
            <?php
            echo "<div class='produto'><span>professor: </span> $professor</div>";

            echo "<div class='quantidade'><span>materia: </span> $materia</div>";

            echo "<div class='total'><span>cargahoraria: </span> $cargahoraria</div>";

            echo "<div class='total'><span>codigodeturma: </span> $codigodeturma</div>";

            echo "<div class='total'><span>serie: </span> $serie</div>";

            echo "<div class='total'><span>saladeaula: </span> $saladeaula</div>";

            ?>
        </div>
        </form>
    </div>
</body>
</html>