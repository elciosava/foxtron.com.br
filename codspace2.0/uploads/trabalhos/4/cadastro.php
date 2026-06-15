<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     * {
        padding: 0px;
        margin: 0px;
    }

    body {
        background-color: lightblue;
    }
    header {
        margin: 0;
        padding:15px;
        background-color: lightblue;
        align-items: center;
        justify-content: center;
    }

    .formulario {
        display: flex;
        align-items: center;
        flex-direction: column;
        background-color: lightskyblue;
    }
    h2{
        display: flex;
        justify-content: center;
    }
    form {
        width: 250px;
    }

    input ,select {
        width: 100%;
    }

    .resultado{
        align-items: center;
        justify-content: center;
        display: flex;
        flex-direction: column;
    }
    </style>
</head>
<body>
    <header>
        <h2>Frutolandia</h2>

        <nav>
            <ul>
                <li>fazer pedido</li>
                <li>ver pedido</li>
            </ul>
        </nav>
    </header>
    <div class="formulario">
     <form action="salvar.php" method ="get">
     <label for="cliente">Cliente:</label>
     <input type="text" name="cliente" id="">

     <label for="produto">Produto:</label>
     <select name="produto" id="">
        <option value="abacaxi">abacaxi</option>
        <option value="morango">morango</option>
        <option value="laranja">laranja</option>
        <option value="pera">pera</option>
     </select>

     <label for="tipo">tipo:</label>
     <select name="tipo" id="">
        <option value="fruta">fruta</option>
        <option value="legume">legume</option>
     </select>
     <label for="quantidade">quantidade:</label>
      <input type="number" name="quantidade" id="">

      <label for="valor">valor:</label>
      <input type="number" name="valor" id="">
     

     <button type="submit">Enviar</button>
     </form>
    </div>
</body>
</html>