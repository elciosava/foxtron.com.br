<?php
  $meunome = 'Rosane Oliveira';

  $produto = $_GET['produto'];
  $quantidade = $_GET['quantidade'];
  $valor = $_GET['valor'];

    $total = $quantidade * $valor;
?>
<!DOCTYPE html>
<html lang="pt-bl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header {
            background: burlywood;
        }
        body {
            background: white;
        }
    </style>
</head>
<body>
    <header>
      <h2><?php echo $meunome ?></h2>
    </header>
    <div class="formulario">
        <form action="" method="get">
         <label for="produto">produto</label>
         <input type="text" name="produto" id="">
         <label for="quantidade">quantidade</label>
         <input type="number" name="quantidade" id="">
         <label for="valor">valor</label>
         <input type="number" name="valor" id="">

         <button type="submit">enviar</button>
        </form>
        <div>
            <div class="resultado">
        <?php
        echo "<div class='produto'><span>Produto:
        </span>$produto</div>";
        echo "<div class='protudo'><span>Total: </span>$total</div>";
        ?>
            </div>
</body>
</html>