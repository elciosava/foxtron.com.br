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
        <h2>Cadstro de Legumes</h2>
    </header>

    <div class="formulario">
        <form action="salvar.php" method="get">

        <label for="produto">Produto</label>
        <select name="produto" id="">
            <option value="pepino">Pepino</option>
            <option value="alface">Alface</option>
            <option value="repolho">Repolho</option>
            <option value="batata">Batata</option>
            <option value="maçã">Maçã</option>
            <option value="banana">Banana</option>
            <option value="limão">Limão</option>
            <option value="laranja">Laranja</option>
        </select>

        <label for="tipo">Tipo</label>
        <select name="tipo" id="">
            <option value="legumes">Legumes</option>
            <option value="frutas">Frutas</option>
           
        </select>

        <label for="quantidade">Quantidade</label>
        <input type="number" name="quantidade" id="">

        <label for="valor">Valor</label>
        <input type="number" name="valor" id="">

        <button type="submit">Enviar</button>

        </form>
    </div>
</body>
</html>