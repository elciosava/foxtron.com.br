<?php

        ini_set('display_errors',0);

$texto = $_POST['texto'];
$radio = $_POST['radio_button'];
$checkbox = $_POST['checkbox'];
$select = $_POST['selecione'];
$data = $_POST['data'];
$cores = $_POST['cores'];

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
<h2>Aula 26/09/2025</h2>
  </header>

  <div class="container">
<form action="" method="post">
    <label for="texto">Texto</label>
    <input type="text" name="texto" id="">

    <label for="radio_button">Radio button</label>
 
    <input type="radio" name="radio_button" id=""value="verde">Verde
    <input type="radio" name="radio_button" id="" value="vermelho">Vermelho

    <label for="checkbox">Checkbox</label>
    <input type="checkbox" name="marca" value="Fruta">Fruta
    <input type="checkbox" name="marca" value="Legume">Legume


    <label for="selecione"></label>
    <select name="selecione" id="">
        <option value="Carro">Carro</option>
        <option value="Moto">Moto</option>
        <option value="Moto">Bicicleta</option>
    </select>

    <label for="data">data</label>
    <input type="date" name="data" value="data">

    <label for="cores">Cores</label>
    <input type="color" name="cores" value="cores">

   <button type="submit">Enviar</button>
</form>

  <div class="resultado">
    <?php
    echo "<div>  $texto </div>";
    echo "<div>  $radio </div>";
    echo "<div>  $checkbox </div>";
    echo "<div>  $select </div>";
    echo "<div>  $data </div>";
    echo "<div>  $cores </div>";
    ?>
  </div>
  </div>
</body>
</html>