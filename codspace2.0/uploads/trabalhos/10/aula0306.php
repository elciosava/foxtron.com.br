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
        <h2>Cadstro de Ifood</h2>

        <nav>
            <ul>
                <li>Fazer pedido</li>
                <li>Ver pedido</li>
            </ul>
        </nav>
    </header>

    <div class="formulario">
        <form action="enviar_pedidos.php" method="get">
        <label for="cliente">Cliente</label>
        <input type="text" name="cliente" id="">

        <label for="produto">Produto</label>
        <select name="produto" id="">
            <option value="X-Bacon">X-Bacon</option>
            <option value="X-Salada">X-Salada</option>
            <option value="X-Frango">X-Frango</option>
            <option value="X-Burger">X-Burger</option>
            <option value="X-Tudo">X-Tudo</option>
        </select>

        <label for="bebidas">Bebidas</label>
        <select name="bebidas" id="">
            <option value="Coca-Cola">Coca-Cola</option>
            <option value="Fanta">Fanta</option>
            <option value="Sprite">Sprite</option>
            <option value="Pepsi">Pepsi</option>
        </select>

        <button type="submit">Enviar</button>

        </form>
    </div>
</body>
</html>