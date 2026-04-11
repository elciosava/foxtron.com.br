<?php
$n1 = $_POST['n1'];
$n2 = $_POST['n2'];

$soma = $n1 + $n2;
$subtracao = $n1 - $n2;
$divisao = $n1 / $n2;
$multi = $n1 * $n2;


echo "Soma: " . $soma . "</br>";
echo "Subtração: " . $subtracao . "</br>";
echo "Multiplicação: " . $multi . "</br>";
echo "Divisão: " . $divisao . "</br>"; 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="n1">Numero 1</label>
            <input type="number" name="n1" id="">
            
            <label for="n2">Numero 2</label>
            <input type="number" name="n2" id="">
            
            <button type="submit">Calcular</button>
        </form>
    </div>
</body>
</html>