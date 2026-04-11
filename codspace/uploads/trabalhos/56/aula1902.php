<?php
$nuero1= $_GET['numero1'];
$numero2 = $_GET['numero2'];

$soma = $numero1 + $numero2;
echo $soma;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=sectio, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section id="formulario">
      <form action="" method="get">
        <label for="numero 1">numero 1</label>
        <input type="text" name="numero1" id="">
        <label for="numero 2">numero 2</label>
        <input type="text" name="numero2" id="">
        <button type="submit">enviar</button>
      </form>
    </section>
</body>
</html>