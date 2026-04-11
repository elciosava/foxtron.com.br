<?php

    $bone= $_POST['bone'];
    $preco= $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $total = $_POST['total'];


    echo $bone ."</br>";
    echo $preco . "</br>";
    echo $quantidade . "</br>";
     echo $total . "</br>";
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
            <label for="bone">produto:</label>
            <input type="text" name="bone" id="">
            
           <label for="preco">preço</label>
            <input type="number" name="preco" id="">
            
           
           <label for="quantidade">quantidade</label>
            <input type="quantidade" name="quantidade" id="">
            

            <label for="total">total:</label>
            <input type="number" name="total" id="">
            <button type="submit">Enviar</button>

           

            
        </form>
    </div>
</body>
</html>