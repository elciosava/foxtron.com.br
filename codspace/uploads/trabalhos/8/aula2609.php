<?php
ini_set('display_errprs',0);

$texto = $_POST['texto'];
$radio = $_POST['radio_button'];
$checkbox = $_POST['marca'];
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
        <h2>aula 26/09/25</h2>
    </header>

    <div class="container">
        <form action="" method="post">

            <label for="texto">Texto</label>
            <input type="text" name="texto" id="">

            <label for="radio_button">Radio button</label>
            <input type="radio" name="radio_button" id="" value="verde">Verde
            <input type="radio" name="radio_button" id="" value="vermelho">Vermelho

            <label for="checkbox">ChackBox</label>
            <input type="checkbox" name="marca" value="fruta">Fruta
            <input type="checkbox" name="marca" value="legume">Legume

            <label for="selecione">selecione</label>
            <select name="selecione" id="">
                <option value="carro">carro</option>
                <option value="moto">moto</option>
                <option value="bicicleta">bicicleta</option>

            </select>
            <label for="data">Data</label>
            <input type="date" name="data" id="">
            
            <label for="cores">Cores</label>
            <input type="color" name="cores" id="">

        <button type="submit">Enviar</button>
        </form>

         <div class="resultados">

            <?php
            echo "<div> $texto </div>";
            echo "<div> $radio </div>";
            echo "<div> $checkbox </div>";
            echo "<div> $select </div>";
            echo "<div> $data </div>";
            echo "<div> $cores </div>";
            ?>
         </div>

    </div>
   

</body>

</html>