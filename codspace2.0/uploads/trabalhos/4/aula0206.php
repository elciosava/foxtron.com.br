<?php
    $meunome = 'João Pedro';

    $produto = $_GET ['produto'];
    $quantidade = $_GET ['quantidade'];
    $valor = $_GET ['valor'];

    $total = $quantidade * $valor;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     * {
        padding: 0px;
        margin: 0px;
        
    }
    body {
        background-color: white;
    }
    </style>
    
</head>
<body>
    <header>
       <h2><?php echo $meunome ?></h2> 
    </header>
    <div class="formulario">
        <form action="" method="get">
          <label for="produto">Produto:</label>  
          <input type="text" name="produto" id="">

          <label for="quantidade">Quantidade:</label>
          <input type="number" name="quantidade" id="">

          <label for="valor">Valor:</label>   
          <input type="number" name="valor" id="">
          <input type="submit" value="Enviar">

        </form>

    </div>

    <div class="resultado">
        <?php
        echo "<div class='produto'><span>produto: </span>$produto</div>";
        echo "<div class='produto'><span>total: </span>$total</div>";
        ?>
    </div>
</body>
</html>