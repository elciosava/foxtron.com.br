<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        header {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background: #ff1100
        }
        header img{
            width: 30px
        }
        ul{
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 50px;
            padding: 5px;
        }
        li {
            list-style: none;
            margin-left: 20px;
            display: flex;
            align-items: center;
        }
        input[type="search"] {
            width: 250px;
            padding: 5px;
            font-size: 1.1em;
            border-radius: 20px;
        }
        .container {
            width: 100%;
        }
        .container img {
            width: 100%;
        }
    </style>
</head>
<body>
 <header>
    <h2>Ian Weirich</h2>
    <input type="search" name="" id="">
    <nav>
      <ul>
        <li><img src="user-solid-full.svg" alt="">Usuario</li>
        <li><img src="heart-regular-full.svg" alt="">Favorito</li>
        <li><img src="cart-shopping-solid-full.svg" alt="">Carrinho</li>
      </ul>
    </nav>
 </header>
     <section id="inicio">
        <div class="container">
            <img src="https://images.unsplash.com/photo-1610359797625-64f9f083cf99" alt="">
        </div>
    </section>
</body>
</html>