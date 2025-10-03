<?php

?><!DOCTYPE html>
<html lang="py-r">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         * {
            margin: 0;
            padding: 0;
         }


        header {
            height: 60px;
            background: light;
        }
        .inicio {
            height: calc(100vh - 70px);
            background: gray;
        }

          .container {
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 10px
          }

          .coluna {
            background: rgb(144,155,155);
            height: calc(100vh)
           
          }


    </style>
</head>
<body>
    <header>
        <h2>erick gabriel</h2>
    </header>

    <section class="inicio">

        <div class="container">
           <div class="coluna">
            <nav class="ul">
                <li><img src="2.jpg" alt=""></li>
                <li><img src="" alt=""></li>
                <li><img src="" alt=""></li>
                <li><img src="" alt=""></li>
            </nav>
           </div>
           <div class="coluna"></div>
           
        </div>

    </section>
    
</body>
</html>