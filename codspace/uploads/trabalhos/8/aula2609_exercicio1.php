<?php
ini_set('display_errprs', 0);

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

            <label for="texto"> Nome Cliente </label>
            <input type="text" name="texto" id="">

            <label for="radio_button"> Prioridade </label>
            <input type="radio" name="radio_button" id="" value="verde">Verde
            <input type="radio" name="radio_button" id="" value="vermelho">Vermelho

            <label for="checkbox"> Selecione o seu PC </label>
            <input type="checkbox" name="marca" value="PCgamer">PC Gamer
            <input type="checkbox" name="marca" value="PCbasico">PC Basico

            <label for="selecione">selecione</label>
            <select name="selecione" id="">
                <option value="placaMae">Placa Mae</option>
                <option value="placaMae">asus b550</option>
                <option value="placaMae">giga byte</option>


            </select>
            <label for="selecione">selecione</label>
            <select name="selecione" id="">
                <option value="memoria">memoria</option>
                <option value="memoria">kingston</option>
                <option value="memoria">huper ex</option>
            </select>
            <label for="selecione">selecione</label>
            <select name="selecione" id="">
                <option value="processador"> processador</option>
                <option value="processador">AMD</option>
                <option value="placaMae">Instel</option>

            </select>
            <label for="selecione">selecione</label>
            <select name="selecione" id="">
                <option value="gabinete"> gabinete</option>
                <option value="gabinete">FullTowe</option>
                <option value="gabinete">MidTowe</option>

            </select>
            <label for="selecione">selecione</label>
            <select name="selecione" id="">
                <option value="fonte"> Fonte</option>
                <option value="fonte">asus</option>
                <option value="fonte">consair</option>

            </select>
            <label for="selecione">selecione</label>
            <select name="selecione" id="">
                <option value="monitor"> monitor</option>
                <option value="monitor">LG</option>
                <option value="monitor">acer</option>

            </select>
            <label for="selecione">selecione</label>
            <select name="selecione" id="">
                <option value="teclado"> teclado</option>
                <option value="teclado">redragon</option>
                <option value="teclado">dell</option>

            </select>
            <label for="selecione">selecione</label>
            <select name="selecione" id="">
                <option value="mouse">mouse</option>
                <option value="mouse">redragon</option>
                <option value="mouse">dell</option>

            </select>
            <label for="selecione">selecione</label>
            <select name="selecione" id="">
                <option value="placa de video"> placa de video</option>
                <option value="placadevideo">RTX 4060</option>
                <option value="placadevideo">RTX 4090</option>

            </select>



            <label for="data">Data de entrega </label>
            <input type="date" name="data" id="">

            <label for="cores">Prioridade</label>
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