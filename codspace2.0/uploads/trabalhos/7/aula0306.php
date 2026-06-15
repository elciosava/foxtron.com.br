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
        <h2>cadastro de ifood</h2>
        <nav>
            <ul>

                <li>fazer pedido</li>
                <li>ver pedido</li>
            </ul>
        </nav>
    </header>
    <div class="formulario">
        <form action="enviar_pedidos.php" method="post">
            <label for="cliente">cliente</label>
            <input type="text" name="cliente" id="">
            
            <label for="produto">produto</label>
            <select name="produto" id="">
                <option value="">x-tudo</option>
                <option value="">x-salada</option>
                <option value="">x-bacon</option>
                <option value="">x-egg</option>
            </select>
            <label for="bebida">bebida</label>
            <select name="bebida" id="">
                <option value="">Coca-Cola</option>
                <option value="">Fanta</option>
                <option value="">Sprite</option>
                <option value="">Pepsi</option>
                <option value="">Agua com gás</option>
                <option value="">Agua com limão</option>
            </select>
            <button type="submit">enviar</button>
        </form>
    </div>

</body>

</html>