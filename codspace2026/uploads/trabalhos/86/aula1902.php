<?php
    $numero1=$_GET['numero1'];
    $numero2=$_GET['numero2'];

    $soma= $numero1+$numero2;

    echo $soma;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <section id="formulario">
       <form action="" method="get">

        <label for="numero1">Número 01</label>
        <input type="text" name="numero1" id="">

        <label for="numero2">Número 02</label>
        <input type="text" name="numero2" id="">
        
        <button type="submit">CLICK</button>
       </form>
     </section>
    
</body>
</html>