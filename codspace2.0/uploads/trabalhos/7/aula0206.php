<?php
$meunome = 'amo vocês ';
$quantidade = $_GET['quantidade'];
$produto = $_GET['produto'];
$valor = $_GET['valor'];

$total = $quantidade * $valor;

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
        <h2><?php echo $meunome ?></h2>
        <?php
        echo "<h2>$meunome</h2>"


        ?>
        <div class="formulario">
            <form action="" method="get">
                <label for="produto">produto</label>
                <input type="text" name="produto" id="">


                <label for="quantidade">quantidade</label>
                <input type="number" name="quantidade" id="">
                <label for="valor">valor</label>
                <input type="valor" name="valor" id="">
                <button type="submit">enviar</button>
            </form>
        </div>
        <div class="resultado">
            <?php
            echo "<div class='produto'><span> produto: </span>$produto</div>";
            echo "<div class='produto'><span> total: </span>$total</div>";
            ?>
        </div>

    </header>
</body>

</html>