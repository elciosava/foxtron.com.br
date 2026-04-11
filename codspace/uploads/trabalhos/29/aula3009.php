<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
      * {
        margin: 0;
        padding: 0;

    }
        header {
            height: 100px;
            background: blue;
            color: red;
        }
       .inicio {
            height: calc(100vh - 100px);
            background: purple;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 10px;
        }

        .coluna{
            height: calc(100vh - 100px);
            background: white;
        }
        .icones {
            width: 50px;
        }
    </style>
</head>
<body>
    <header>
        <h2>Gabriel marschalk</h2>
    </header>

    <section class="inicio">
        <div class="container">
            <div class="coluna">
            <nav class="ul">

                <div class="icones">
                <li><img src="user-solid-full.svg" alt="" class="">perfil</li>
                <li><img src="car-solid-full.svg" alt="">carrinho</li>
                <li><img src="moon-solid-full.svg" alt="">dia a dia</li>
                <li><img src="motorcycle-solid-full.svg" alt="">passeio</li>
                </div>
                

             </nav>
            </div>
             <div class="coluna">
             <img src="https://img.a.transfermarkt.technology/portrait/big/148688-1708118601.jpg?lm=1" alt="">
             </div>

        </div>
    </section>
    
</body>
</html>