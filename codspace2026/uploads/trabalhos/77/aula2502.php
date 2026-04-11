<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de compra</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        header {
            display:flex;
            justify-content: space-around;
            align-items: center;
            height:50px;
            padding:5px; 
            background-color: #ababab;
        }
        header img {
            width: 30px;
        }

        ul {
            display:flex;
            justify-content: space-around;
            align-items: center;
        }

        li {
            list-style: none;
            margin-left:20px;
            display: flex;
            align-items:center;
        }

        input[type="search"]{
            width: 250px;
            padding:5px 5px 5px 25px;
            font-size: 1.1em;
            border-radius:20px;
        }

       .icone-cart:hover {
        content:url("cart-arrow-down-solid-full.svg");
}
        .icone-user:hover {
            content:url("user-solid-full.svg");
}
        .icone-heart:hover {
            content:url("heart-solid-full.svg");
        }
        .container {
            width:100%
        }
        .container img {
            width:100%;
            height: 100vh;
        
}
    </style>

</head>
<body>

    <header>
        <h2>Site de compra</h2>
        <input type="search" name="" id="">
            <nav>
                <ul>
                    <li><img src="user-regular-full.svg" class="icone-user" alt="">Usuário</li>
                    <li><img src="heart-regular-full.svg" class="icone-heart" alt="">Favorito</li>
                    <li><img src="cart-plus-solid-full.svg" class="icone-cart" alt="">Carrinho</li>
                </ul>
            </nav>
    </header>

    <section id="inicio">
        <div class="container">
            <img src="https://images.unsplash.com/photo-1633934542430-0905ccb5f050" alt="">
        </div>

    </section>
</body>
</html>