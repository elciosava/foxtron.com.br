<?php
ini_set('display_errors',0);
$select = $_POST['sistema operacional'];
$select = $_POST['teclado'];
$select = $_POST['mouse'];
$select = $_POST['monitor'];

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <header>
    <h2>Pariféricos e Software</h2>
   </header>
   <div class="container">
    <form action="" method="post">
    <label for="sistema operacional">Sistema Operacional</label>
            <select name="sistema operacional" id="">
            <option value="Windows">Windows</option>
            <option value="Linux">Linux</option>
            </select>           

            <label for="teclado">Teclado</label>
            <select name="teclado" id="">
            <option value="Redragon Kumara Pro">Redragon Kumara Pro</option>
            <option value="HyperX Alloy Core RGB">HyperX Alloy Core RGB</option>
            </select>           

            <label for="mouse">Mouse</label>
            <select name="mouse" id="">
            <option value="Logitech G203 LIGHTSYNC">Logitech G203 LIGHTSYNC</option>
            <option value="Logitech MX Master 3S">Logitech MX Master 3S</option>
            </select>           

            <label for="monitor">Monitor</label>
            <select name="monitor" id="">
            <option value="Monitor LG 24MP60G-B">Monitor LG 24MP60G-B</option>
            <option value="Monitor AOC 24G2/24G4">Monitor AOC 24G2/24G4</option>
            </select>           

            <button type= "submit">Enviar</button>
    </form>
    <div class="resultado">
    <?php
            echo "<div> $sistemaoperacional </div>";
            echo "<div> $teclado </div>";
            echo "<div> $mouse </div>";
            echo "<div> $monitor </div>";
            ?>
    </div>
   </div>
</body>
</html>