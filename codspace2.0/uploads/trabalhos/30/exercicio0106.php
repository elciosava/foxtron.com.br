<?php
$nome = $_GET['nome'];
$materia = $_GET['materia'];
$nota1 = $_GET['nota1'];
$nota2 = $_GET['nota2'];
$nota3= $_GET['nota3'];
$nota4 = $_GET['nota4'];
$media=($nota1 + $nota2 + $nota3 + $nota4)/4;
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

        body{
            background: lightblue;
        }

        input{

        width: 100%;

        }
        form{
            width: 300px;
            padding: 15px;

        }
        .container{

        justify-content: center;
        display: flex;
        align-items: center;
        flex-direction: column;
        }

        header{

        justify-content: center;
        align-items: center;
        display: flex;
        height: 80px;
        background: lightslategray;
        }
    </style>
</head>
<body>
    <header>
        <h2>
            materia e media
        </h2>
    </header>
    <div class="container">
        <form action="" method="get">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="">

        <label for="materia">materia:</label>
        <input type="text" name="materia" id="">

        <label for="nota1">nota1</label>
        <input type="number" name="nota1" id="">

        <label for="nota2">nota2</label>
         <input type="number" name="nota2" id="">

        <label for="nota3">nota3</label>
         <input type="number" name="nota3" id="">

        <label for="nota4">nota4</label>
        <input type="number" name="nota4" id="">
        
        <button type="submit">enviar</button>
       </form>
       <div class="resultados">
        <?php
        echo "<div class='nome' >$nome</div>";
        echo "<div class='materia'>$materia</div>";
         echo "<div class='media'>$media</div>";
        ?>
       </div>
    </div>
</body>
</html>