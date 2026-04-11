<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
        <style>
         * {
            margin: 0;
            padding: 0;
        } 

        html {
            font-family: Segoe UI;
           background: linear-gradient(to left, #4400ffff, #466a7aff);
        }  

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
             height: 100vh; 
        }

        button {
            background-color: rgba(26, 60, 100, 1);
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
            margin-top: 4px;
        }

        button:hover {
            background-color: rgba(10, 22, 129, 1);
        }

           .form-box {
            
            background-color: rgba(96, 27, 153, 1);
            border: 2px solid rgba(0, 0, 0, 1); 
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }

       
        </style>
</head>
<body>
    <div class="form-box">
    <nav>
        <ul>
        
    <li><a href="alunos.php"><button>Alunos</button></a> </li>
    <li><a href="computadores.php"><button>Computadores</button></a></li>
    <li> <a href="reserva.php"><button>Reserva</button></a></li>
        
        </ul>
    </nav>
    </div>
</body>
</html>