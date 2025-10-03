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
</body>
</html>

<style>
    *{
        margin: 0;
        padding: 0;
    }

    .icones img {
        width: 40px;
        height: 40px;
        margin-left: 20px;
    }
    header{
        display: flex;
        justify-content: space-around;
        align-items: space-around;
        height: 50px;
        padding: 10px;
        background: lightgreen;
    }

    .icones {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .coluna{
        background: white;
        height: calc(100vh - 70px);
    }
    form{
        widht: 350px;
    }

    .coluna input {
        display: flex;
        <justify-content: center;
        align-items: center;
        font-size: 1.1rem;
        background: lightgreen;
    }

    .coluna{
        display: flex;
        justify-content: center;
    }
    button {
        padding: 10px 20px;
        margin-top: 20px;
        background: lightgreen;
    }
    </style>
    <!DOCTYPE html>
    <html lang="en">
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
                height: 50px;
                display: flex;
                justify-content: space-betwen;
                align-items: center;

            }
            .icones{
                display: flex;
                justify-content: center;
                align-items: center;
            
            }
            form{
                width: 350px;
            }

            .container {
                display: grid;
                grid-template-columns: 1fr 3fr;
                gap: 10px;
            }

            .coluna {
                height: calc(100vh - 70px);
                background: rgb(155,155,155);
            }

            li img{
                width: 70px;
                height: 70px;
            }
            img{
                width: 300px;
                height: 300px;
            }


    </style>

    </head>
    <body>
        <header>
            <h2>Daniel Freire</h2>
            <div class="icones">
                <img src="user-solid-full.svg" alt=""><span>Minha conta</span>
                <img src="heart-solid-full.svg" alt=""><span>Favoritos</span>
                <img src="cart-shopping-solid-full.svg" alt=""><span>Meu carrinho</span>


            </div>
        </header>
        <selection class="inicio">
            <div class="container">
                <div class="coluna">
                    <nav class="ul">
                        <li><img src="house-solid-full.svg" alt=""></li>
                        <li><img src="bus-solid-full.svg" alt=""></li>
                        <li><img src="motorcycle-solid-full.svg" alt=""></li>
                        <li><img src="truck-solid-full.svg" alt=""></li>
                    </nav>
                </div>
                <div class="coluna">
                    <img src="Ronaldo.jpg" alt="">
                    <h2>Cristiano Ronaldo é um dos maiores jogadores de futebol de todos os tempos </h2>
                <div class="formulario">
                    <form action="formulario.php" method="post">
                        <label for="nome">Nome :</label>
                        <input type="text" name="nome" id="">
                        <label for="email">email :</label>
                        <input type="email" name="email" id="">
                        <label for="senha">Senha :</label>
                        <input type="passworld" name="senha" id="">
                        <label for="estado">estado :</label>
                        <input type="text" name="estado" id="">
                        <button type="submit">Enviar</button>

                    </form>
                </div>
                </div>

                
            
            </div>
        </div>
    </body>
    </html>
        