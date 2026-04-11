<?php
    ini_set('display_errors',0);

    $cor = $_POST['cor'];
    $texto = $_POST['texto'];
    $veiculo = $_POST['veiculo'];
    $select = $_POST['selecione'];
    $motor = $_POST['motor'];
    $suspencao = $_POST['suspencao'];
    $pneu = $_POST['pneu'];
    $carroceria = $_POST['carroceria'];
    $interior = $_POST['interior'];
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
        <h2>Monte o seu Possante</h2>
    </header>

    <div class="container">
        <form action="" method="post">
            <label for="Marca">Marca</label>
            <input type="text" name="texto" id="">

            <label for="veiculo">Selecione Veiculo</label>

            <input type="radio" name="veiculo" id="" value="Carro">Carro
            <input type="radio" name="veiculo" id="" value="Caminhonete">Caminhonete

            <label for="checkbox">Cor</label>
            <input type="checkbox" name="cor" value="Branco">Branco
            <input type="checkbox" name="cor" value="Azul">Azul
            <input type="checkbox" name="cor" value="Verde">Verde

            <label for="motor">Motorização</label>
            <select name="motor" id="">
                <option value="V6 Diesel">V6 Diesel</option>
                <option value="V6 Gasolina">V6 Gasolina</option>
                <option value="V8 Diesel">V8 Diesel</option>
                <option value="V8 Gasolina">V8 Gasolina</option>
            </select>

            <label for="suspencao">Tipo de suspenção</label>
            <select name="suspencao" id="">
                <option value="Rígida">Rígida</option>
                <option value="Suave">Suave</option>
                <option value="Competição">Competição</option>
            </select>

            <label for="interior">interior</label>
            <select name="interior" id="">
                <option value="Caramelo">Caramelo</option>
                <option value="Branco Neve">Branco Neve</option>
                <option value="Bordô">Bordô</option>
            </select>

            <label for="pneu">pneu</label>
            <select name="pneu" id="">
                <option value="Off-Road">Off-Road</option>
                <option value="Slick">Slick</option>
                <option value="Semi-Slick">Semi-Slick</option>
                <option value="Esportivo Falken">Esportivo Falken</option>
            </select>

            <label for="carroceria">carroceria</label>
            <select name="carroceria" id="">
                <option value="Fibra de Carbono">Fibra de Carbono</option>
                <option value="Fibra de Vidro">Fibra de Vidro</option>
                <option value="Alumínio">Alumínio</option>
            </select>

            <button type="submit">Enviar</button>

        </form>

        <div class="resultado">
            <?php
                echo "<div> $veiculo </div>";
                echo "<div> $select </div>";
                echo "<div> $motor </div>";
                echo "<div> $suspencao </div>";
                echo "<div> $interior </div>";
                echo "<div> $pneu </div>";
                echo "<div> $carroceria </div>";
                echo "<div> $texto </div>";
                echo "<div> $cor </div>";
            ?>
        </div>
    </div>
</body>
</html>