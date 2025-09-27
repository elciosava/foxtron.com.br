 <?php

   ini_set("display_error", 0);
    
    $texto = $_POST["texto"];
    $radio = $_POST["radio_button"];
    $checkbox = $_POST["marca"];
    $selecione = $_POST["selecione"];
    $data = $_POST["date"];
    $cores =$_POST["color"];
    
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
      <h2>aula 26/09/2025</h2>
</header>

    <div class="container">
        <form action="" method="post">

            <label for="texto">texto</label>
              <input type="texto" name="texto" id="">

            <label for="radio_button">radio button</label>
              <input type="radio" name="radio_button" id="" value="verde">verde
              <input type="radio" name="radio_button" id="" value="vermelho" >vermelho

            <label for="checkbox">checkbox</label>
              <input type="checkbox" name="marca" value="Fruta">Fruta
              <input type="checkbox" name="marca" value="Legume">Legume

              <label for="select">selecione</label>
              <select name="selecione" id="">

                <option value="carro">carro</option>
                <option value="bicicleta">bicicleta</option>
                <option value="aviao">aviao</option>
                <option value="trem">trem</option>
              </select>

              <label for="date">data</label>
              <input type="date" name="data" id="">

              <label for="cores">Cores</label>
              <input type="color" name="cores" id="">

              <button type="submit">Enviar</button>

        </form>
  
        <div class="resultado">
    <?php 

        echo "<div> $texto </div>";
        echo "<div> $radio </div>";
        echo "<div> $checkbox </div>";
        echo "<div> $selecione </div>";
        echo "<div> $data </div>";
        echo "<div> $cores </div>";

    ?>

        </div>

    </div>

</body>
</html>