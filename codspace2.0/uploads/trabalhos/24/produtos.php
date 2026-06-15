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
    <h2>Cadastro da frutolandia</h2>
    <nav>
        <ul>
            <li>Fazer pedido</li>

            <li>Ver pedido</li>
        </ul>
    </nav>
    </header>

    <div class="formulario">
        <form action="salvar.php" method="get">
        
        <label for="produto">Produto</label>
        <select name="produto" id="">

        <option value="cebola">Cebola</option>
        <option value="tomate">Tomate</option>
        <option value="batata">Batata</option>
        <option value="banana">Banana</option>
        <option value="ameixa">Ameixa </option>
    </select>
        
        <label for="quantidade">Quantidade</label>
        <input type="number" name="quantidade" id="">

        <label for="tipo">Tipo</label>
        <select name="tipo" id="">

        <option value="fruta">Fruta</option>
        <option value="legume">Legume</option>

        </select>

        <label for="valor">Valor</label>
        <input type="number" name="valor" id="">
        <button type="submit">Enviar</button>

    </form>    
    </div>
</body>
</html>