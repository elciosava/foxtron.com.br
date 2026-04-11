<?php
$n1 = $_POST['n1'];
$n2 = $_POST['n2'];

$soma = $n1+$n2;
$subtracao = $n1-$n2;
$multiplicacao = $n1*$n2;

echo $soma . "</br>";
echo $subtracao  . "</br>";
echo $multiplicacao  . "</br>";

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
    <label for="n1">n1</label>
    <input type="number" name="n1" id="">

    <label for="n2">n2</label>
    <input type="number" name="n2" id="">

    <button type="submit">Calcular</button>
    </form>
</body>
</html>

