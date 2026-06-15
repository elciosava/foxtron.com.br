<?php
    $meunome = 'Formulário';

    $professor = $_GET['professor'];
    $materia = $_GET['materia'];
    $cargahoraria = $_GET['cargahoraria'];
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
            padding: 0px;
            margin: 0px;
        }

        form {
            width: 350px;
            height: 50vh;

        }

        input {
            width: 100%;
        }

        .formulario {

            justify-content: center;
            display: flex;
            align-items: center;
            flex-direction: row ;
        }

        body {
            background: gray;

        }
        
        header {
            justify-items: center;
            padding-top: 40px;
            margin-top: 40px;
        }
    </style>


</head>
<body>
    <header>
        <h2><?php echo $meunome ?></h2>
        
        <div class="formulario">
        <form action="" class="get">
            <label for="professor">Professor</label>
            <input type="text" name="professor" id="">

            <label for="materia">Matéria</label>
            <input type="text" name="materia" id="">

            <label for="cargahoraria">Carga horária</label>
            <input type="number" name="cargahoraria" id="">

            <label for="codigo">Código da turma</label>
            <input type="number" name="codigo" id="">

            <label for="serie">Série: </label>
            <input type="number" name="serie" id="">

            <label for="sala">Sala</label>
            <input type="number" name="sala" id="">



            <button type="submit">Enviar</button>
        </form>
    </div>
    <div class="resultado">
        <?php
        echo "<div class='formulario' ><span>Professor: </span> $professor</div>";
        echo "<div class='formulario' ><span>Matéria: </span> $materia</div>";
        echo "<div class='formulario' ><span>Carga Horaria: </span> $cargahoraria</div>";
        echo "<div class='formulario' ><span>Codigo da turma: </span> $codigo</div>";
        echo "<div class='formulario' ><span>Série: </span> $serie</div>";
        echo "<div class='formulario' ><span>Sala: </span> $sala</div>";


        ?>
    </div>
    </header>


</body>
</html>