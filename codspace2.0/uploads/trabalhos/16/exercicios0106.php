<?php
$nome = $_GET['nome'];

$materia = $_GET ['materia'];

$n1 = $_GET['n1'];
$n2 = $_GET['n2'];
$n3 = $_GET['n3'];
$n4 = $_GET['n4'];
$media = ($n1+$n2+$n3+$n4)/4;


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: auto;
            padding: auto;
            
        


        }
        form {
            width: 450px;
        }
        input {
            width: 100%;
        }       
        .container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            
        }     
        body {
            text-decoration: none;
            background-color: lightgoldenrodyellow;
        }
        header {
            text-decoration: double;
            display: flex;
            background-color: lightblue;
            height: 67px;
        }
        
        
    
    
    </style>
</head>
<header>
    <h2>MATERIA E MEDIA</h2>

</header>
<body>
    <div class="container">
        <form action="" method="get">
            <label for="nome">nome</label>
            <input type="text" name="nome" id="">
            <label for="materia">materia</label>
            <input type="text" name="materia" id="">
            <label for="n1">nota 1</label>
            <input type="number" name="n1" id="">
            <label for="n2">nota 2</label>
            <input type="number" name="n3" id="">
            <label for="n3">nota 3</label>
            <input type="number" name="n3" id="">
            <label for="n4">nota 4</label>
            <input type="number" name="n4" id="">
            <button type="submit">enviar    </button>
        </form>
        <div class="resultado">
            <?php
            echo "<div class='nome'>$nome</div>";
            echo "<div class='materia'>$materia</div>";
            echo "<div class='media'>$media</div>";
            ?>
        </div>
        
    </div>
</body>
</html>
