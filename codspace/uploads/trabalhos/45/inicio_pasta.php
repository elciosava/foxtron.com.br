<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

           body {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100vh;
        }

    </style>
</head>
<body>

        <?php    
        include 'componente/componente2.php';
    ?>


    <?php    
        include 'componente/formulario_pasta.php';
    ?>

      <?php    
        include 'componente/componente1.php';
    ?>


    <?php
        include 'componente/menu_pasta.html';

        ?>

</body>
</html>