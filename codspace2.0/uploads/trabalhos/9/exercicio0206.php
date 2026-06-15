<?php
    $meunome = 'cadastro';
    
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
            background-color: bisque;
        }
       header{
            margin: 0;
            padding: 15px;
            background: ;
            align-items: center;
            justify-content: center;
        }

        .formulario{
          display: flex;
            align-items: center;
            flex-direction: column;
            background-color: bisque;
        }
        h2 {
            display: flex;
            justify-content: center;
        }
         form {
            width: 350px;
        }
         input {
            width: 100%;
        }

        .resultado {
            align-items: center;
            justify-content: center;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <header>
        <h2><?php echo $meunome ?></h2>
    </header>
    <div class="formulario">
        <form action="" method="get">
            <label for="professor">professor:</label>
            <input type="text" name="professor" id="">

            <label for="materia">materia:</label>
            <input type="text" name="materia" id="">

            <label for="carga">carga h:</label>
            <input type="number" name="carga" id="">

            <label for="codigo">cotigo:</label>
            <input type="number" name="codigo" id="">

            <label for="serie">serie:</label>
            <input type="number" name="serie" id="">

            <label for="sala">sala:</label>
            <input type="number" name="sala" id="">




            <input type="submit" value="enviar">

        </form>
    </div>

    <div class="resultado">
        <?php
        echo "<div class='professor'><span>professor: </span>$professor</div>";
        echo "<div class='materia'><span>materia: </span>$materia</div>";
        echo "<div class='carga'><span>carga: </span>$carga</div>";
        echo "<div class='codigo'><span>codigo: </span>$codigo</div>";
        echo "<div class='serie'><span>serie: </span>$serie</div>";
        echo "<div class='sala'><span>sala: </span>$sala</div>";
        ?>
    </div>
</body>
</html>