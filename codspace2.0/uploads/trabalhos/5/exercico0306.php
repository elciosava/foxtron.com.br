<?php


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            background-color: lightyellow;
        }
    </style>
</head>
<body>
<header>
        <h2>frutolandia</h2>
<nav>
    <ul>
        <li>fazer pedido</li>
        <li>ver pedido</li>
    </ul>
</nav>
</header>

<div class="formulario">
    <form action="salvar.php" method="get">
    <label for="cliente">cliente</label>
    <input type="text" name="cliente" id="">

    <label for="verduras">verduras</label>
    <select name="produto" id="">
        <option value="tomate">tomate</option>
        <option value="alface">alface</option>
        <option value="pepino">pepino</option>
        <option value="cenoura">cenoura</option>
        <option value="repolho">repolho</option>
    
    </select>

    <label for="frutas">frutas</label>
    <select name="" id="">

        <option value="banana">banana</option>
        <option value="maça">maça</option>
        <option value="uva">uva</option>
        <option value="abacate">abacate</option>
        <option value="morango">morango</option>
    </select>



 </select>

    <label for="quantidade">quantidade</label>
    <select name="" id="">

        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>




    <button type="submit">Enviar</button>

</form>
</div>
</body>
</html>