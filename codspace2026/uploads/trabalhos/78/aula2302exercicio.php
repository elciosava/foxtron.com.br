<?php
$produto = $_POST['produto'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$total = $preco * $quantidade;

echo "Produto: " . $produto . "<br>";
echo "Preço: R$ " . $preco . "<br>";
echo "Quantidade: " . $quantidade . "<br>";
echo "Total: R$ " . $total . "<br>";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 23/02 Exercicio</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" type="imagex/png" href="img/icon.png">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="produto">Produto</label>
            <input type="text" name="produto" id="">

            <label for="preco">Preço (R$)</label>
            <input type="number" name="preco" id="">

            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="">

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>