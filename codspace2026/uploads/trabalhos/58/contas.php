<?php
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];

    echo $n1 . "</br>";
    echo $n2 . "</br>";
    $resultado = $n1 + $n2;
    echo "A soma deu: " . $resultado . "</br>";
    $resultado = $n1 - $n2;
    echo "A subtração deu: " . $resultado . "</br>";
    $resultado = $n1 * $n2;
    echo "A multiplicação deu: " . $resultado . "</br>";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="n1">Numero 01:</label>
            <input type="number" name="n1" id="">

            <label for="n2">Numero 02:</label>
            <input type="number" name="n2" id="">

            <button type="submit">Calcular</button>
        </form>
    </div>
</body>
</html>