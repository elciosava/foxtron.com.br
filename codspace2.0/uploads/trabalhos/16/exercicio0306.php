<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h2>cadastro da frutolandia</h2>
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

        <label for="produto">produto</label>
        <select name="produto" id="">
            <option value="cebola">cebola</option>
            <option value="alface">alface</option>
            <option value="manga">manga</option>
            <option value="brocoliss">brocolis</option>
        </select>
        <label for="quantidade">quantidade</label>
        <select name="quantidade" id="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>

            
        </select>
        <label for="tipo">tipo</label>
        <select name="tipo" id="">
            <option value="verduras">verduras</option>
            <option value="frutas">frutas</option>
            <option value="legumes">legumes</option>
        </select>
        <label for="valor">valor</label>
        <select name="valor" id="">
            
          <option value="15">15</option>
        </select>
        
        
        <button type="submit">enviar</button>
    </form>
    </div>
</body>
</html>