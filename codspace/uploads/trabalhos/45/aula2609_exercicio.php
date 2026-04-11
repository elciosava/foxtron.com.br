<?php

   ini_set("display_error", 0);

     $texto = $_POST["texto"];
     $radio = $_POST["radio_button"];
     $selecione = $_POST["select"];

   ?>

   <!DOCTYPE html>
   <html lang="pt-br">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        * {
            margin: 0;
            padding: 0;

        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
            

        }

    </style>
   </head>
   <body>

     <header>

        <h2>Criador de carro</h2>

     </header>

     <div class="container">
       <form action="" method="post">

    <label for="texto">Marca do carro</label>
    <input type="texto" name="texto" id="">

    <label for="radio_button">Tipo</label>
      <input type="radio" name="radio_button" id="" value="Usado">Usado
      <input type="radio" name="radio_button" id="" value="Novo">Novo

    <label for="select">Media do preço</label>
    <select name="selecione" id="">

      <option value="10,000-20,000">10,000-20,000</option> 
      <option value="20,000-50,000">20,000-50,000</option>
      <option value="50,000-100,000">50,000-100,000</option>
    </select>

    <button type="submit">compra </button>

    </form>

    <div class="resultado">

    <?php 

        echo "<div> $texto <div>";
        echo "<div> $radio <div>";
        echo "<div> $selecione <div>";
        
        ?>

    </div>
    </div>

   </body>
   </html>