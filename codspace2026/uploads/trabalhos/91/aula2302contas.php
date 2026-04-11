<?php
$n1 = $_POST['n1'] ?? null;
$n2 = $_POST['n2'] ?? null;

if ($n1 !== null && $n2 !== null) {

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
    <title>Calculadora</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label>n1:</label>
            <input type="number" name="n1" required>

            <label>n2:</label>
            <input type="number" name="n2" required>

            <button type="submit">Calcular</button>
        </form>

        <?php if (isset($soma)) { ?>
            <h3>Resultados:</h3>
            <p>Soma: <?= $soma ?></p>
            <p>Subtração: <?= $subtracao ?></p>
            <p>Multiplicação: <?= $multiplicacao ?></p>
            <p>Divisão: <?= $divisao ?></p>
        <?php } ?>
    </div>
</body>
</html>