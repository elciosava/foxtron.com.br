<?php
    ini_set('display_errors',0);

    $periferico = $_POST['periferico'];
    $placa_mae = $_POST['placa_mae'];
    $placa_de_video = $_POST['placa_de_video'];
    

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
        <h2>Aula 26/09/25</h2>            
    </header>
    <div class="container">
        <form action="" method="post">
            
            
            <label for="periferico">Periferico</label>
            <select name="periferico" id="">
                <option value="Mouse">Mouse</option>
                <option value="Teclado">Teclado</option>
                <option value="Impressora">Impressora</option>
            </select>
           
            <label for="placa_mae">Placa mae</label>
            <select name="placa_mae" id="">
                <option value="b450">B 450</option>
                <option value="b550">B 550</option>
                <option value="a320">A 320</option>
            </select>
            <label for="placa_de_video">Placa de video</label>
            <select name="placa_de_video" id="">
                <option value="c317">C 317</option>
                <option value="d568">D 568</option>
                <option value="e842">E 842</option>
            </select>

            <button type="submit">Enviar</button>

            
            </form>

            <div class="resultado">
                <?php
                    echo "<div> $periferico </div>";
                    echo "<div> $placa_mae </div>";
                    echo "<div> $placa_de_video </div>";
                   
                ?>

            </div>
    </div>

</body>
</html>