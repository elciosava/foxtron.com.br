<?php
$produto = $_POST['produto'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$total = $preco * $quantidade;

echo "Produto: " . $produto . "</br>";
echo "Preço: " . $preco . "</br>";
echo "Quantidade: " . $quantidade . "</br>";
echo "Total: " . $total . "</br>";
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
        <label for="produto">Produto</label>
         <input type="text" name="produto" id="">

         <label for="preco">Preço</label>
         <input type="number" name="preco" id="">

         <label for="quantidade">Quantidade</label>
         <input type="number" name="quantidade" id="">

        <button type="submit">Salvar</button>
    </form>
    </div>
</body>
</html>
