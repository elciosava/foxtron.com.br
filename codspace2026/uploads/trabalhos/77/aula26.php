<?php
ini_set("display_errors",0);
$cor= $_POST['cor'];
$cor_cod= $_POST['cor_cod'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 26-02</title>

    <style>
    * {
        margin:0;
        padding:0;
    }
   
    .container {
        width: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: solid 2px #5cd5da;
        padding: 20px;
        background: #7bf4f8;
        color: #000000;
        margin: 10px;
    }

    .resultado {
        width: 345px;
        border: solid 2px #5cd5da;
        padding: 20px;
        background: #7bf4f8;
        color: #000000;
        margin: 10px;
        box-sizing: border-box;
    }

    input {
        width: 100%;
        box-sizing: border-box;
    }

    header {
        background: #7bf4f8;
        height: 50px;
        padding: 5px 0 5px 0;
        width: 100vw;
    }

    body {
        background-color:rgb(255, 255, 255);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

    }

    button {
        margin: 5px 0 0 0;
        padding: 2px;
    }

    .formdata {
        width: 200px;
        border: solid 2px #5cd5da;
        padding: 20px;
        background: #7bf4f8;
    }

    input [type="date"] {
        width: 100%;
        box-sizing: border-box;
    }
   
    </style>

</head>
<body>
    <header>

</header>
    <section id="inicio">

    <div class="container">
    <form action="" method="post">

    <label for="cor">Escreva uma cor:</label>
    <input type="text" name="cor" id="">

    <label for="cor_cod">Escolha a cor para saber o codigo:</label>
    <input type="color" name="cor_cod" id="">

    <button type="submit">Enviar</button>

    </form>
    
    </div>
    
   <div class="resultado">
    <?php

    echo ("A cor é: "), $cor ."</br>";
    echo ("O código é: "), $cor_cod ."</br>";

    ?>
   </div>
   </section>

   <section id="corpo">
    <form action="" method="post" class="formdata">
        <label for="data_inicial">Data de Inicio:</label>
        <input type="date" name="data_inicial" id="">

        <label for="data_final">Data de final:</label>
        <input type="date" name="data_finl" id="">

        <button type="submit">Enviar</button>
    </form>
   </section>
   
</body>
</html>