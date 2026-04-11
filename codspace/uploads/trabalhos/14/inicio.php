<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
        header {
            display: flex;
        }
        ul {
            display:flex;
            list-style:none;
        }
        li {
            width: 100px;
        }
    </style>
</head>
<body>
    <?php
    include 'componentes/menu.html';
    ?>
    <?php
    include 'componentes/formulario.php';
    ?>
    <?php
    include 'componentes/cadastro.php';
    ?>
    <?php
    include 'componentes/img.php';
    ?>
</body>
</html>