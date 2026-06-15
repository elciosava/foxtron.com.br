<?php

$produto= $_GET['produto'];
$quantidade= $_GET['quantidade'];
$valor= $_GET['valor'];
$tipo= $_GET['tipo'];







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
        <h2>Cadastro da Frutolandia</h2>
    </header>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        header {
            height: 210px;
            justify-content: center;
            display: flex;
            align-items: center;
            background-color: antiquewhite;

        }

        .formulario {
            justify-content: center;
            align-items: center;
            display: flex;
            flex-direction: column;
        }

        body {

            background-color: slategray;
        }

        input,select {
            width: 100%;
        }

        form{
            width: 350px;
            padding: 30px;
        }


    </style>

    <div class="formulario">
        <form action="enviar_pedidos.php" method="get">

        
         <label for="cliente">Cliente</label>
        <input type="text" name="cliente" id="">


          
        <label for="produto">Produto</label>
        <select name="produto" id="">
            <option value="morango">Morango</option>
            <option value="uva">Uva</option>
            <option value="abacaxi">Abacaxi</option>
            <option value="manga">Manga</option>
        </select>


        <label for="tipo">Tipo</label>
        <select name="tipo" id="">
            <option value="legumes">Legume</option>
            <option value="fruta">Fruta</option>
            <option value="Cereal">Cereal</option>
           
        </select>

        <label for="valor">Valor</label>
        <input type="text" name="valor" id="">

          <label for="valor">Quantidade</label>
        <input type="text" name="quantidade" id="">
           
        

        <button type="submit">Enviar</button>
        </form>

        
    
</body>
</html>