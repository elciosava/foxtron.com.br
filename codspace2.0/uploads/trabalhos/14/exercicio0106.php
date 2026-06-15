<?php
$nome = $_GET['nome'];
$materia = $_GET['materia'];
$n1 = $_GET['nota1'];
$n2 = $_GET['nota2'];
$n3 = $_GET['nota3'];
$n4 = $_GET['nota4'];

$media = ($n1+$n2+$n3+$n4)
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
       header{
       align-items: center;
       justify-items: center;
       padding: 50px;
       background-color: gray;

       }

       .container{
        display: flex;
        align-items: center;
        justify-content: center;
       }
       form{
        width: 600px;
        background-color: gray;

       }
       input{
        width: 100%;
       }
       body{
        background-color: gray;
       }

    </style>
    <head>

<body>
    <header>
        <h1>media</h1>
    </header>

    <div class="container">
        <form action="" method="get">
            <label for="">nome</label>
            <input type="text" name="nome" id="">
            <label for="">materia</label>
            <input type="text" name="materia" id="">
            <label for="">Nota1</label>
            <input type="number" name="n1" id="">
            <label for="">Nota2</label>
            <input type="number" name="n2" id="">
            <label for="">Nota3</label>
            <input type="number" name="n3" id="">
            <label for="">Nota4</label>
            <input type="number" name="n4" id="">
            
            <button type="submit">Enviar</button>

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

