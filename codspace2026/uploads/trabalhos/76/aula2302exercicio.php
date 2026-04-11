<?php
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];

    echo $produto . "</br>"; 
    echo $quantidade . "</br>";
    echo $preco . "</br>"; 

    $resultado = $quantidade * $preco;

    echo $resultado;
?>
<!DOCTYPE html>
<html lang="en">
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

        <label for="quantidade">quantidade</label>
        <input type="number" name="quantidade" id="">

        <label for="preco">Preço</label>
        <input type="number" name="preco" id="">

        <button type="submit">Enviar</button>
    </form>
    </div>
</body>
</html>