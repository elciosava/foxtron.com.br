<?php
    $produto = $_POST['produto'];
    $preço = $_POST['preço'];
    $quantidade = $_POST['quantidade'];
    
    echo $produto . "</br>";
    echo $preço . "</br>";
    echo $quantidade . "</br>";
    $resultado = $preço * $quantidade;
    echo "O total do produto é: " . $resultado;
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
            <label for="produto">Pruduto:</label>
            <input type="text" name="produto" id="">

            <label for="preço">Preço:</label>
            <input type="number" name="preço" id="">

            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="">

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>