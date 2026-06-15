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
        <H2>Cadastro para frutolandia</H2>

        <nav>
            <ul>
                <li>Fazer Pedido</li>
                <li>Ver Pedido</li>
            </ul>
        </nav>
    </header>
    <div class="formulario">
        <form action="salvar.php" method="get">
            <label for="cliente">Cliente: </label>
            <input type="text" name="cliente" id="">

            <label for="produto"></label>
            <select name="produto" id="">
                <option value="tomate">Tomate</option>
                <option value="alface">Alface</option>
                <option value="abacaxi">Repolho</option>
                <option value="melancia">Melacia</option>
                <option value="cebola">Cebola</option>
                <option value="uva">Uva</option>

            </select>


            <label for="quantidade">Quantidade: </label>
            <input type="number" name="quantidade" id="">


            <label for="tipo">Tipo</label>
            <select name="tipo" id="">
                <option value="legume">legume</option>
                <option value="fruta">fruta</option>
            </select>

            <label for="valor">Valor</label>
            <input type="number" name="valor" id="">


            <button type="submit">Fazer Pedido</button>

        </form>
    </div>

</body>

</html>