<?php

ini_set('display_errors',0);

$texto = $_POST['texto'];
$radio = $_POST['radio_button'];
$checkbox = $_POST['marca'];
$select = $_POST['selecione'];
$data = $_POST['data'];
$cores = $_POST['cores']


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h2> Aula 26/09/2025</h2>
    </header>

    <div class="container">

        <form action="" method="post">

            <label for="texto">texto</label>
            <input type="text" name="" id="">

            <label for="radio">radio_button</label>

            <input type="radio" name="radio_button" id="" value="verde">verde
            <input type="radio" name="radio_button" id="" value="vermelho">vermelho

            <label for="checkbox">checkbox</label>
            <input type="checkbox" name="" value="">fruta
            <input type="checkbox" name="" value="">legume

            <label for="selecione">selecione</label>
            <select name="selecione" id="">

                <option value="carro">carro</option>
                <option value="moto">moto</option>
                <option value="bicicleta">bicicleta</option>
            </select>

            <label for="data">data</label>
            <input type="data" name="data" id="">

            <label for="cores">cores</label>
            <input type="color" name="color" id="">


            <button type="submit">enviar</button>

        </form>
        <div class="resultados">
            <?php

echo "<div> $texto </dic>";
echo "<div> $radio </dic>";
echo "<div> $checkbox </dic>";
echo "<div> $select </dic>";
echo "<div> $data </dic>";
echo "<div> $cores </dic>";
            ?>
        </div>
    </div>

</body>

</html>