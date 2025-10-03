<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        *{
            margin: 0;
            padding: 0;
        }

        

       
          header {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 50px;
            padding: 15px;
            background: lightblue;
           
            
        }

        
        .inicio {
            display: grid;
            height: calc(100vh - 80px);
           
        }

        
        
        form {
            width: 350px;
            
        }
        
        .icones {
            display:flex;
            justify-content: space-around;
            align-items: center;
            height:60px;
            
            
        }

       
       
        
        .container {
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 10px;
        }
        .coluna {
            height: calc(100vh - 80px);
            background: lightgreen;
           
        }
        .formulario {
         padding:40px 20px;
         font-size:2rem;
        }

        .button {
            padding: 10px 20px;
           
        }
        
    </style>
</head>
<body>
    <header>
        <h2>Hugo A.</h2>
         <input type="search" name="busca" id="">
      

         </div>
    </header>
    
    <section class="inicio">
        <div class="container">
         <div class="coluna">

        <nav>
            <ul>
             <div class="icones">
            <li><img src="motorcycle-solid-full.svg" alt="">Moto</li>
            <li><img src="mug-hot-solid-full.svg" alt="">Carro</li>
            <li><img src="bowl-food-solid-full.svg" alt="">Comida</li>
            <li><img src="mug-hot-solid-full.svg" alt="">Bebida</li>
            </div>
            </ul>
        </nav>

         </div>
         <div class="coluna">
            <div class="img">
                <img src="OIP.webp" alt="">
                <h2>Minecraft</h2>
                <ul>
                    <li>O Minecraft é um Jogo com um mundo quadrado</li>

                    <div class="formulario">
                    <form action="formulario.php" method="post">
            <label for="nome">Nome :</label>
            <input type="text" name="nome" id="">
            <label for="email">email :</label>
            <input type="email" name="email" id="">
            <label for="senha">Senha :</label>
            <input type="passworld" name="Senha" id="">
            <label for="Opiniao">Opiniao :</label>
            <input type="text" name="Opiniao" id="">
            
            <div class="button">
            <button type="submit">Enviar</button>
            </div>
        </form>
        </div>

            </div>

         </div>
        </div>
    </section>
    </div>
</body>
</html>