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
        <h2>Cadastro de ifood</h2>

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
        <input type="text"name="cliente"id="">

        <label for="produto">produto</label>
        <select name="produto" id="">
            <option value="x-tudo">X-tudo</option>
            <option value="x-egg">X-egg</option>
            <option value="x-salada">X-salada</option>
            <option value="x-bacon">X-bacon</option>
        </select>

        <label for="bebidas">Bebidas</label>
        <select name="bebidas" id="">
         <option value="coca-cola">Coca-Cola</option>
            <option value="fanta">Fanta</option>
            <option value="sprite">Sprite</option>
            <option value="agua">Agua</option>
            <select>

            <button type="submit">Enviar</button>




        </form>
    </div>
</body>
</html>