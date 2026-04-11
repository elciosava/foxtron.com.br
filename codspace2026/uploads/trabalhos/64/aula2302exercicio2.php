<?php
$n1 = $_POST['n1'];
$n2 = $_POST['n2'];


$resultado1 = $n1 + $n2;
echo "A soma é " . $resultado1 . "</br>";
$resultado2 = $n1 - $n2;
echo "A subtração é " . $resultado2 . "</br>";
$resultado3 = $n1 * $n2;
echo "A multiplicação é " . $resultado3 . "</br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="n1">Numero 1:</label>
        <input type="number" name="n1" id="">

        <label for="n2">Numero 2:</label>
        <input type="number" name="n2" id="">

        <button type="submit">Calcular</button>
    </form>
</body>
</html>

