<?php
$nome = $_POST ['nome'];
$sobrenome =  $_POST ['sobrenome'];
$cargo = $_POST ['cargo'];
$salario = $_POST ['salario'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>24-02</title>
    <style>
         * {
            margin: 0;
            padding: 0;
        }
      
        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
       
        .container {
        width: 400px;
        padding: 5px;
        background: rgba(100, 127, 201, 1);
        color: rgba(255, 255, 255, 1);
       }
       
       input {
        width: 400px;
        box-sizing: border-box;
        }

       div2 {            
        margin: 10px;
        padding: 15px;
        background: rgba(12, 75, 158, 0.93);
        color: rgba(255, 255, 255, 1);            
        }
        
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="">

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" name="sobrenome" id="">

        <label for="cargo">Cargo:</label>
        <input type="text" name="cargo" id="">

        <label for="salario">Salario:</label>
        <input type="number" name="salario" id="">

        <button type="submit"><Em>ENVIAR</Em></button>

        </form>
    </div>
    <div2 class="resultado">
        <?php

        echo ("Olá "), $nome, (" ");
        echo $sobrenome ."</br>";
        echo ("Você está no cargo: "), $cargo ."</br>";
        echo ("Recebendo atualmente "), $salario, (" reais")."</br>";
        ?>

    </div2>
</body>
</html>