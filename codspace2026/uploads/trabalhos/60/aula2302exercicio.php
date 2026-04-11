<?php
    $produto = $_POST['produto'];
    $preço = $_POST['preço'];
    $quantidade = $_POST['quantidade'];
    $total = $_POST['total'];

    echo $produto."</br>";
    echo $preço."</br>";
    echo $quantidade."</br>";
    echo $total."</br>";
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

        <label for="preço">Preço</label>
        <input type="text" name="preço" id="">

        <label for="quantidade">Quantidade</label>
        <input type="text" name="quantidade" id="">

        <label for="total">Total</label>
        <input type="text" name="total" id="">

        <button type="submit">Enviar</button>
      </form>
   </div>
</body>
</html>
