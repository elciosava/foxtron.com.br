<?php
    $professor = $_GET['professor'];
    $materia = $_GET['materia'];
    $carga = $_GET['carga'];
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
        *{
            padding: 0;
            margin: 0;
        }
        body{
            background-color: lightsteelblue;          
        }
        header{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: lightblue;
        }
        .formulario{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: lightseagreen;
        }
        .resultado{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: lightskyblue;
        }

        form{
            width: 350px;
        }

        input{
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h2>Cadastro</h2>
    </header>
    <div class="formulario">
        <form action="" method="get">
            <label for="professor">Professor:</label>
            <input type="text" name="professor" id="">

            <label for="materia">Matéria:</label>
            <input type="text" name="materia" id="">

            <label for="carga">Carga Horária:</label>
            <input type="text" name="carga" id="">

            <label for="codigo">Código da turma:</label>
            <input type="text" name="codigo" id="">

            <label for="serie">Série:</label>
            <input type="text" name="serie" id="">

            <label for="sala">Sala de aula:</label>
            <input type="text" name="sala" id="">

            <input type="submit" value="Enviar">  
        </form>
    </div>
    <div class="resultado">
        <?php
            echo "<div class='professor'><span>Professor: </span>$professor</div>";
            echo "<div class='materia'><span>Matéria: </span>$materia</div>";
            echo "<div class='carga'><span>Carga Horária: </span>$carga</div>";
            echo "<div class='codigo'><span>Código da Sala: </span>$codigo</div>";
            echo "<div class='serie'><span>Série: </span>$serie</div>";
            echo "<div class='sala'><span>Sala de Aula: </span>$sala</div>";
        ?>    
    </div>
</body>
</html>