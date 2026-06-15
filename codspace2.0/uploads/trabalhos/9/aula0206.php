<?php
    $meunome = 'ruam freisleben';
    
    $produto = $_GET['produto'];
    $quantidade = $_GET['quantidade'];
    $valor = $_GET['valor'];

    $total = $quantidade * $valor;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
           padding: 0px;
           margin: 0px;
        }
        body{
            background-color: antiquewhite;
        }
        header{
            display: flex;
            margin-top: 10px;
            padding: 10px;
        }

        .formulario{
            margin: 10px;
            display: flex;
            background-color: aquamarine;
        }
    </style>
</head>
<body>
    <header>
        <h2><?php echo $meunome ?></h2>
    </header>
    <div class="formulario">
        <form action="" method="get">
            <label for="produto">produto:</label>
            <input type="text" name="produto" id="">

            <label for="quantidade">quantidade:</label>
            <input type="number" name="quantidade" id="">

            <label for="valor">valor:</label>
            <input type="number" name="valor" id="">

            <input type="submit" value="enviar">

        </form>
    </div>

    <div class="resultado">
        <?php
        echo "<div class='produto'><span>produto: </span>$produto</div>";
        echo "<div class='produto'><span>produto: </span>$total</div>";
        ?>
    </div>
</body>
</html>