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
            
            background: #c1e3ed
        }
        ul {
             display: flex;
            justify-content: space-around;
            align-items: center;
            height: 50px;
            padding: 5px;
        }
        header img {
            width: 30px;
        }
        li {
            list-style: none;
            margin-left: 20px;
            display: flex;
            align-items: center;
        }   
        input[type="search"] {
            width: 250px;
            padding: 5px 0 5px 0;
            font-size: 1,1em;
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
    <h2>gabriel franklin</h2>
    <input type="search" name="" id="">
    <nav>
       <ul>
        <li><img src="user-regular-full.svg" alt="">Usuario</li>
        <li><img src="heart-regular-full.svg" alt="">Favorito</li>
        <li><img src="cart-flatbed-solid-full.svg" alt="">Carrinho</li>
       </ul>
   </nav>
</header>

     <section id="inicio">
        <div class="container">
            <img src="https://images.unsplash.com/photo-1771030666262-093e276dbdcd" alt="">
        </div>
     </section>
</body>
</html>
