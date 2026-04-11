<?php

ini_set('display_errors', 0);

 $nome = $_GET['nome'];
 $sobrenome = $_GET['sobrenome'];
 $mensagem = $_GET['mensagem'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
           
        header {
            height: 70px;
            padding: 10px;
            background: rgb(41,2,140);
        }
        .inicio{
            background: rgb(255,245,21);
            height:calc(100vh - 70px);
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 10px;
        }

        .coluna {
            height: calc(100vh - 70px);
            background: rgb(252,252,252);
        }
        .icones img {
            width: 80px;
            height: 80px;
            margin-left: 20px;
        }
        form {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <header>
        <h2>lucas brbs</h2>
        
       </header>
      <section class="inicio">
    <div class="container">
         <div class="coluna"><nav>
            <ul>
                <li><img src="house-solid-full.svg" alt="">Inicio</li>
                <li><img src="whatsapp-brands-solids-full.svg"alt="">conversas</li>
                <li><img src="phone-solid-full.svg" alt="">Contato</li>
                <li><img src="user-solid-full.svg" alt="">conta</li>
                </div>
    </ul>
    </nav></div>
        <div class="coluna"></div>
       
        </div>
    </section>
</body>
</html>