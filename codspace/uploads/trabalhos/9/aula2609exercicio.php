<?php
    ini_set('display_errors',0);

    $texto=$_POST ['texto'];
    $placam=$_POST ['placam'];
    $processador=$_POST ['processador'];
    $Ram=$_POST ['Ram'];
    $placav=$_POST ['placav'];
    $armazenamento=$_POST ['armazenamento'];
    $fonte=$_POST ['fonte'];
    $gabinete=$_POST ['gabinete'];
    $cor=$_POST ['cor'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h2> Aula 26/09/2025  exercicio </h2>

    </header>

    <div class="container">
        <form action="" method="post">

        <label for="texto"> Monte seu Pc do seu jeito: </label>    

        <label for="placam"> Placa mãe </label>
        <select name="placam" id=""> 
            <option value="placa mae"> Asus </option>
            <option value="placa mae"> Aorus Elite </option>
            <option value="placa mae'"> Intel </option>
        </select>

        <label for="processador"> Processador </label>
        <select name="processador" id="">
            <option value="processador"> Ryzen  </option>
            <option value="processador"> Core i3 </option>
            <option value="processador"> Intel </option>
        </select>

        <label for="Ram"> Memoria RAM </label>
        <select name="Ram" id="">
            <option value="memoria ram"> Fury beast  </option>
            <option value="memoria ram"> Rise mode </option>
            <option value="memoria ram">  Hiperx </option>
            </select>

            <label for="placav"> Placa de Vídeo </label>
        <select name="placav" id="">
            <option value="placa de video"> Astral  </option>
            <option value="placa de video"> Nvidia </option>
            <option value="placa de video">  Galax  </option>
            </select>

            <label for="amazenamento"> Armazenamento </label>
        <select name="armazenamento" id="">
            <option value="armazenamento"> SanDisk </option>
            <option value="armazenamento"> Hyzeal </option>
            <option value="armazenamento">  Crucial  </option>
            </select>

            <label for="fonte"> Fonte de Alimentação </label>
        <select name="fonte" id="">
            <option value="fonte de alimentação"> Sistems </option>
            <option value="fonte de alimentação"> Intel </option>
            <option value="fonte de alimentação">  Dmix  </option>
            </select>

            <label for="gabinete"> Gabinete </label>
        <select name="gabinete" id="">
            <option value="gabinete"> Jester </option>
            <option value="gabinete"> Tgt </option>
            <option value="gabinete">  G3tech </option>
            </select>

            <label for="cor"> cor do seu gabinete </label>
            <input type="color" name="cor" id="">


            <button type="submit"> enviar </button>

          </form>

          <div class="resultado">
            <?php
                echo "<div> $texto </div>";
                echo "<div> $placam </div>";
                echo "<div> $processador</div>";
                echo "<div> $Ram </div>";
                echo "<div> $placadevideo </div>";
                echo "<div> $armazenamento </div>";
                echo "<div> $fonte </div>";
                echo "<div> $gabinete </div>";
                echo "<div> $cor </div>";

            ?>

          </div>
    </div>
    
</body>
</html>