<?php
      ini_set('display_errors',0);

      $farinha = $_POST['farinha'];
      $açucar = $_POST['açucar'];
      $ovos = $_POST['ovos'];
      $leite = $_POST['leite'];
      $chocolate = $_POST['chocolate'];
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 30px;
            background-color: rgb(110, 109, 109);
            height: 50px;
            color: azure;
        }

         body {
            height: 100vh;
            background-color: rgba(55, 68, 250, 1);
            font-family: sans-serif;
        }

         .container {

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <header> 
        <h2>Em um bolo vai</h2>
    </header>

    <div class="container">
        <form action="" method="post">

         <label for="checkbox"></label>
        <input type="checkbox" name="farinha" id="" value="farinha">farinha
        <input type="checkbox" name="açucar" id="" value="açucar">açucar
        <input type="checkbox" name="ovos" id="" value="ovos">ovos
        <input type="checkbox" name="leite" id="" value="leite">leite
        <input type="checkbox" name="chocolate" id="" value="chocolate">chocolate

         <button type="submit">Enviar</button>
      </form>
      <div class="resultado">
      <?php
      echo "<div> $farinha </div>";
      echo "<div> $açucar </div>";
      echo "<div> $ovos </div>";
      echo "<div> $leite </div>";
      echo "<div> $chocolate </div>";
           
      ?>
      </div>
    </div>
</body>
</html>