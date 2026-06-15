<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h2>cadastro de Ifood</h2>

        <nav>
            <ul>
                <li>Fazer pedido</li>
                <li>Ver pedido</li>
            </ul>
        </nav>
    </header>
    <div class="formulario">
        <form action="enviar_pedidos.php" method="get">
    <label for="cliente">cliente</label>
    <input type="text" name="cliente" id="">

    <label for="produto">produto</label>
    <select name="produto" id="">

    <option value="x-ratão">x-ratão</option>
    <option value="x-infarto">x-infarto</option>
    <option value="x-churrasco">x-churrasco</option>

    </select>

    <label for="bebida">bebida</label>
    <select name="bebida" id="">

    <option value="agua">agua</option>
    <option value="coca">coca</option>
    <option value="pepsi">pepsi</option>
    <option value="guarana">guarana</option>
    <option value="fanta">fanta</option>
    <option value="coconut">coconut</option>

    </select>
    
    <button type="submit">Enviar</button>
    </form>
</div>
</body>
</html>