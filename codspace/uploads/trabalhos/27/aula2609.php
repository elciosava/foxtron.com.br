<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
    <h2>Aula 26/09/2025</h2>
    <header>

    <div class="container">
        <form action=""method="post">
            <label for="texto">Texto</label>
            <input type="text" name="texto" id ="">

            <label for="radio_button">Radio button</label>

            <input type="radio" name="radio_button" id=""value="verde">verde
            <input type=" radio" name="radio_button" id=""value="vermelho">vermelho

            <label for="checkbox">Checkbox</label>
            <input type="checkbox" name="marca" value="">Fruta
            <input type="checkbox" name="marca" value="">Legume

            <label for="selecione">Selecione</label>
            <select name="selecione"id="">
                <option value="carro">carro</option>
                <option value="moto">moto</option>
                <option value="bicicleta">bicicleta</option>
                <select> 
                
            <label for="data">Data</label>
            <input type="date" name="data" id="">

            <label for="cores">Cores</label>
            <input type="color" name="cores" id="">

            <button type="submit">Enviar</button>


        </form>

    <div class="resultado" >
        <?php

           echo "<div> $texto </div>";
           echo "div> $radio </div";
           echo "div> $checkbox </div";
           echo "div> $select</div";
           echo "div> $data </div";
           echo "div> $cores </div";
           


        ?>

    </div>

</body>
</html>
