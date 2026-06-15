<?php
$professor = $_GET['professor'];
$materia = $_GET['materia'];
$cargahoraria = $_GET['horaria'];
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
            margin: 0px;
            padding: 0px;
        }
    
        body {
            background-color: pink;
        }
    
        header {
            background-color: palevioletred;
            padding: 20px;
            justify-content: center;
            justify-items: center;
        }
    
        .container {
            display: flex;
            background-color: palevioletred;
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
    <h2><?php echo $meunome ?></h2>

    <div class="formulario">
        <form action="" class="get">
            <label for="professor">Professor</label>
            <input type="text" name="professor" id="">

            <label for="materia">materia</label>
             <input type="text" name="materia" id="">

              <label for="cargahoraria">Carga horaria</label>
              <input type="number" name="cargahoraria" id="">

              <label for="codigo">Codigo da turma</label>
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
    echo"<div class='formulario' ><span>Professor: </span> $professor</div>";
    echo"<div class='formulario' ><span>Materia: </span> $materia</div>";
    echo"<div class='formulario' ><span>Carga Horaria: </span> $horaria </div>";
    echo"<div class='formulario' ><span>Codigo da Turma: </span> $codigo</div>";
    echo"<div class='formulario' ><span>Serie: </span> $serie</div>";
    echo"<div class='formulario' ><span>Sala: </span> $sala</div>";
    ?>

    </div>    
</body>
</html>