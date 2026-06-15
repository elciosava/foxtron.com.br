<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    header{
        background-color: gray;
    }
</style>
<body>
    <header>
        <h2>Cadastro de frutolandia</h2>

        <nav>
            <ul>
                <li>Fazer pedido</li>
                <li>Ver pedido</li>
            </ul>
        </nav>
    </header>

    <div class="formulario">
        <form action="salvar.php" method="get">
        <label for="cliente">Cliente</label>
        <input type="text"name="cliente"id="">

        <label for="fruta">Frutas</label>
        <select name="fruta" id="">
            <option value="tomate">Tomate</option>
            <option value="pepino">Pepino</option>
            <option value="cenora">Cenora</option>
            <option value="cebola">Alface</option>
        </select>

        <label for="outro">Outr0s</label>
        <select name="outro" id="">
         <option value="banana">Banana</option>
            <option value="abacaxi">Abacaxi</option>
            <option value="melao">Melao</option>
            <option value="morango">Morango</option>
            <select>

            <button type="submit">Enviar</button>




        </form>
    </div>
</body>
</html>
