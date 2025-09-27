<?php
ini_set('display_errors',0);
$nome = $_POST['nome'];
$Placa_Mae = $_POST['Placa_Mae'];
$Processador = $_POST['Processador'];
$SSD = $_POST['SSD'];
$Gabinete = $_POST['Gabinete'];
$Monitor = $_POST['Monitor'];
$cores = $_POST['cores'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            margin: 0 10px;
        }

        header {
            
            padding: 5px 20px;
            background: black;
            height: 50px;
            color: blue;
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
<h2>Monte Seu PC.Com.BR</h2>

  </header>

  <div class="container">
<form action="" method="post">
    <label for="nome">nome</label>
    <input type="text" name="nome" id="">

    
 
    <select name="Placa_Mae" id="">
        <option value="Placa_Mae">Placa_Mae</option>
     <option value="ASUS ROG Strix B550-F Gaming (AM4)">ASUS ROG Strix B550-F Gaming (AM4)</option>
     <option value="MSI MAG B660M Mortar WiFi DDR4 (LGA 1700)">MSI MAG B660M Mortar WiFi DDR4 (LGA 1700)</option>
     <option value="ASRock A320M-HD (AM4)">ASRock A320M-HD (AM4)</option>
    </select>
   

      
    <select name="Processador" id="">
        <option value="Processador">Processador</option>
        <option value="Intel Core i5-12400F">Intel Core i5-12400F</option>
        <option value="AMD Ryzen 5 5600X">AMD Ryzen 5 5600X</option>
        <option value="Intel Core i7-13700K">Intel Core i7-13700K</option>
    </select>

    
    <select name="SSD" id="">
        <option value="SSD">SSD</option>
        <option value="Samsung 970 EVO Plus (NVMe M.2)">Samsung 970 EVO Plus (NVMe M.2)</option>
        <option value="Kingston A2000 (NVMe M.2)">Kingston A2000 (NVMe M.2)</option>
        <option value="Crucial MX500 (SATA 2.5)">Crucial MX500 (SATA 2.5")</option>
    </select>

    <select name="Gabinete" id="">
        <option value="">Gabinete</option>
        <option value="Full Tower">Full Tower</option>
        <option value="Mid Tower">Mid Tower</option>
        <option value="Mini Tower">Mini Tower</option>
    </select>
    <select name="Monitor" id="">
        <option value="">Monitor</option>
        <option value="LG UltraGear 24GN600-B">LG UltraGear 24GN600-B</option>
        <option value="Samsung Odyssey G5">Samsung Odyssey G5</option>
        <option value="AOC 24B1XHS">AOC 24B1XHS</option>

    <label for="cores">Cor para seu PC</label>
    <input type="color" name="cores" value="cores">

   <button type="submit">Enviar</button>
</form>

  <div class="resultado">
    <?php
    echo "<div>  $nome </div>";
    echo "<div>  $Placa_Mae </div>";
    echo "<div>  $Processador </div>";
    echo "<div>  $SSD </div>";
    echo "<div>  $Gabinete </div>";
    echo "<div>  $Monitor </div>";
    echo "<div>  $cores </div>";
    ?>
  </div>
  </div>
</body>
</html>