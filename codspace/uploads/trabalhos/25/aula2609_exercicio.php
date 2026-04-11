<?php
ini_set('display_errors',0);

$texto = $_POST['texto'];
$radio = $_POST['computador_button'];
$checkbox = $_POST['marca'];
$select = $_POST['computador'];
$data = $_POST['data'];
$cores = $_POST['cores'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</header>
    <h2>Aula2 26/09/25</h2>
</header>

 <input type="computador" name="computador_button" id="" value="Azul">Azul
        <input type="computador" name="computador_button" id="" value="Amarelo">Amarelo


 <label for="checkbox">Checkbox</label>
        <input type="checkbox" name="marca" value="Maça">Maça
        <input type="checkbox" name="marca" value="Alface">Alface

<label for="caminhão">Caminhão</label>
        <select name="onibus" id="">
            <option value="Carro">Carro</option>
            <option value="Escola">Escola</option>
            <option value="Computador">Computador</option>
        </select>

         <label for="data">Data</label>
        <input type="date" name="data" id="">

        <label for="cores">Cores</label>
        <input type="color" name="cores" id="">

        <button type="submit">Enviar</button>


</form>

<div class="resultado">
        <?php
        echo "<div> $texto </div>";
        echo "<div> $computador</div>";
        echo "<div> $checkbox </div>";
        echo "<div> $select </div>";
        echo "<div> $data</div>";
        echo "<div> $cores </div>";
        ?>

</div>
</div>

</body>
</html>