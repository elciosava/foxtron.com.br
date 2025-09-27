<?php
ini_set('display_errors',0);
$shape = $_POST['shape'];
$lixa = $_POST['lixa'];
$trucks = $_POST['trucks'];
$rodas = $_POST['rodas'];
$rolamentos = $_POST['rolamentos'];
$parafusos = $_POST['parafusos'];
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><style>
       
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Verdana;
            background: lightblue

        }
    </style>
</head>
<body>
<header>
      <h2>Formulario de como montar um skate</h2>
      <header>
      <div class="container">
    <form action="" method="post">
    <label for="checkbox">Skate:</label>
            <input type="checkbox" name="shape" value="Shape">Shape
            <input type="checkbox" name="lixa" value="Lixa">Lixa   
            <input type="checkbox" name="trucks" value="Trucks">Trucks
            <input type="checkbox" name="rodas" value="Rodas">Rodas
            <input type="checkbox" name="rolamentos" value="Rolamentos">Rolamentos
            <input type="checkbox" name="parafusos" value="Parafusos">Parafusos
        <button type="submit">Enviar</button>
    </form>
    <div class="resultado">
            <?php
        echo "<div> $shape </div>";
        echo "<div> $lixa </div>";
        echo "<div> $trucks </div>";
        echo "<div> $rodas </div>";
        echo "<div> $rolamentos </div>";
        echo "<div> $parafusos </div>";


            ?>
        </div>
    </div>
</body>

</html>