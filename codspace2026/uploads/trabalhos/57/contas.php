<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];

    $soma = $n1 + $n2;
    $subtracao = $n1 - $n2;
    $multiplicacao = $n1 * $n2;

    if ($n2 != 0) {
        $divisao = $n1 / $n2;
    } else {
        $divisao = "Não é possível dividir por zero";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Simples</title>
</head>
<body>

<form action="" method="post">
    <label>n1:</label>
    <input type="number" name="n1" required>

    <label>n2:</label>
    <input type="number" name="n2" required>

    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h3>Resultados:</h3>";
    echo "Soma: $soma <br>";
    echo "Subtração: $subtracao <br>";
    echo "Multiplicação: $multiplicacao <br>";
    echo "Divisão: $divisao <br>";
}
?>

</body>
</html>