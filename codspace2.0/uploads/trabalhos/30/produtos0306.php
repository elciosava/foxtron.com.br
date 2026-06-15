<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h2>cadastro de legumes</h2>

        <nav>
            <ul>
                <li>fazer pedido</li>
                <li>ver pedido</li>
            </ul>
        </nav>
    </header>

    <div class="formulario">
        <form action="salvar.php" method="get">

    <label for="produto">produto</label>
    <select name="produto" id="">
        <option value="alface">alface</option>
        <option value="repolho">repolho</option>
        <option value="pepino">pepino</option>
        <option value="mandioca">mandioca</option>
        <option value="abobora">abobora</option>
    </select>
    <label for="quantidade">quantidade</label>
    <input type="number" name="quantidade" id="">

    <label for="tipo">tipo</label>
    <select name="tipo" id="">

        <option value="legumes">legumes</option>
        <option value="frutas">frutas</option>
        
        </select>

        <label for="valor">valor</label>
        <input type="number" name="valor" id="">


        <button type="submit">enviar</button>
        </form>
    </div>
</body>
</html>