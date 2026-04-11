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

        .container {
        border:3px solid black;
        padding: 37px;
        }

        nav {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100vh;
        }

        body {
            background: #f2f5f5ff;
        }

        h2 {
            margin: 1%;
        }

        .aluno {
            margin: 4%;
        }

        .computadores {
            margin: 4%;
        }
        
        .reserva {
            margin: 4%;
        }

    </style>
</head>
<body>
    <header>
        <nav>
              <h2>Reserva Computadores</h2>
            <ul>
                <div class="container">

                <li>Aluno</li>
                   <div class="aluno">
            <a href="aluno.php">Aluno</a>
        </div>

                <li>Computadores</li>
                   <div class="computadores">
            <a href="computador.php">Computadores</a>
        </div>

                <li>Reserva</li>
                   <div class="reserva">
            <a href="reserva.php">Reserva</a>
        </div>

                </div>
            </ul>
        </nav>
    </header>
</body>
</html>