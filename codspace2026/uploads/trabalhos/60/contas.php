<?php
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];

    $soma = $number1+$number2;
    $subtração = $number1-$number2;
    $multiplicação = $number1*$number2;
    
    echo $soma . "</br>";
    echo $subtração . "</br>";
    echo $multiplicação . "</br>";
   
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     
 <form action="" method="post">
   <label for="numero1">Numero 1</label>
   <input type="number1" name="number1" id="">

   <label for="numero2">Numero 2</label>
   <input type="number2" name="number2" id="">

   <button type="submit">Calcular</button>
 </form>
   
    
</body>
</html>