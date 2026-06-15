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
        <h2>cadastro de ifood</h2>
<nav>
    <ul>
        <li>fazer pedido</li>
        <li>ver pedido</li>
    </ul>
</nav>
</header>

<div class="formulario">
    <form action="enviar_pedidos.php" method="get">
    <label for="cliente">cliente</label>
    <input type="text" name="cliente" id="">

    <label for="produto">produto</label>
    <select name="produto" id="">
        <option value="x-tudo">X-tudo</option>
        <option value="x-egg">x-egg</option>
        <option value="x-salada">x-salada</option>
        <option value="x-bacon">x-bacon</option>
    </select>

    <label for="bebidas">bebidas</label>
    <select name="bebida" id="">
        <option value="coca-cola">coca-cola</option>
        <option value="agua">agua</option>
        <option value="sprite">sprite</option>
        <option value="fanta">fanta</option>
    </select>
    <button type="submit">Enviar</button>

</form>
</div>
</body>
</html>