<?php
 $produto= $_POST['produto'];
 $preco= $_POST['preco'];
 $quantidade= $_POST['quantidade'];
 $total= $_POST['total'];

    echo $produto . "</br>";
    echo $preco . "</br>";
    echo $quantidade ."</br>";
    echo $total ."</br>";
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
            <label for="produto">produto:</label>
            <input type="text" name="produto" id="">

            <label for="preco">preço</label>
            <input type="number" name="preco" id="">

            <label for="quantidade">quantidade</label>
            <input type="number" name="quantidade" id="">

            <label for="total">total</label>
            <input type="number" name="total" id="">


            <button type="submit">enviar</button>
        </form>
    
</body>
</html>