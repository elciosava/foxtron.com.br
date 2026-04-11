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

        header {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 50px;
            padding: 5px;
            background: #3b02f5;
        }

        header img {
            width: 30px;
        }

        ul {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        li {
            list-style: none;
            margin-left: 20px;
            display: flex;
            align-items: center;
        }

        input[type="search"] {
            width: 250;
            padding: 5px;
            font-size: 1.1em;
            border-radius: 20px;
        }

        .container {
            width: 100;
        }

        .container img {
            width: 100%;
            
        }

        .coluna {
            background: #98cbf7;
            height: 500px;
            width: 30%;
        }
        section{
            display: flex;
            justify-content: space-around;
            height: calc(100vh- 60px);
            padding: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h2>tun tun tun sarur</h2>
        <input type="search" name="" id="">
        <nav>
            <ul>
                <li><img src="user-regular-full.svg" alt="">Usuario</li>
                <li><img src="heart-regular-full.svg" alt="">Favorito</li>
                <li><img src="cart-arrow-down-solid-full.svg" alt="">Carrino</li>
            </ul>
        </nav>
    </header>

    <section id="inicio">
        <div class="coluna"></div>
        <div class="coluna"></div>
        <div class="coluna"></div>
    </section>
</body>

</html>