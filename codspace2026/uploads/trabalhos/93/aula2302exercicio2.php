<?php

$n1 = $_POST['n1'];
$n2 = $_POST['n2'];

$soma= $n1 + $n2;
$subtrai= $n1 - $n2;
$mult = $n1 + $n2;

echo $soma . "</br>";
echo $subtrai."</br>";
echo $mult."</br>";



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
    <label for="n1">N1</label>
    <input type="nuber" name= "n1" id="">

     <label for="n2">N2</label>
     <input type="number" name="n2" id="">

    <button type="submit">Calcular</button>
      

    </form>





</body>
</html>