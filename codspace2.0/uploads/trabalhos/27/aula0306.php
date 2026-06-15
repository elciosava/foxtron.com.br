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
        <H2>Cadastro de ifood</H2>

         <nav>
        <ul>
            <li>Fazer Pedido</li>
            <li>Ver Pedido</li>
        </ul>
    </nav>
    </header>
        <div class="formulario">
            <form action="enviar_pedidos.php" method="get">
            <label for="cliente">Cliente: </label>
            <input type="text" name="cliente" id="">

            <label for="produto"></label>
            <select name="produto" id="">
                <option value="x-frango">X-frango</option>
                <option value="x-bacon">X-bacon</option>
                <option value="x-ratao">X-ratao</option>
                <option value="x-egg">X-egg</option>

            </select>


            <label for="bebida">bebida: </label>
            <select name="bebida" id="">

             <option value="coca-cola">Coca-cola</option> 
             <option value="fanta">Fanta</option>
             <option value="suco">Suco</option>
             <option value="agua">Agua</option>
            </select>

            <button type="submit">Fazer Pedido</button>

        </form>
        </div>
   
</body>
</html>