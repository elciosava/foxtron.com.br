<?php

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
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px 200px;
            background: #9df0dfff;
            height: 50px;
            color: red;
        }

        .texto h2{
            margin-bottom: 10px;
            font: 100px 100vh;
        }
        
               .Agendar {
            width: 130px;
            height: 160px;
            border: solid 1px black;
            margin: 10px;
            background: #9df0dfff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

           body {
            height: 100vh;
            background: #ffdedeff;
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

           .organiza {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 40vh;
           }
           

    </style>
</head>
<body>
           <header>
        <h2>Hospital</h2>
    </header>

    <div class="container organiza">
        <div class="Agendar Consulta">
            <a href="agendar_consulta1.php">Consulta</a>
        </div>
        <div class="Agendar Cirurgia">
            <a href="agendar_cirurgia.php">Cirurgia</a>
        </div>
        <div class="Agendar Espera">
            <a href="agendar_espera.php">Espera</a>
        </div>
 
</body>
</html>