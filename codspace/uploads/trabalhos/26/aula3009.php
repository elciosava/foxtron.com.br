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

        header{
            height: 100px;
            padding: 50;
            background:lightblue;
            color: purple;
        }

        .inicio{
            background: lightyellow;
            height: calc(100vh - 70px)
        }
        .container{
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 10px;
        }
        .coluna{
            height: calc(100vh - 70px);
            background: rgb(0,94,255);
        }

        li img{
            width: 100px;
            height: 100px;
        }
        
        img{
            width: 250px;
            height: 250px;
        }
    </style>
</head>
<body>
    <header>
        <h2>Tamanduá de Angola</h2>
    </header>
    <section class="inicio">
        <div class="container">
            <div class="coluna">
                <nav>
                    <ul>
                        <div class="icones">
                        <li><img src="house-solid-full.svg" alt="">Inicio</li>
                        <li><img src="download-solid-full.svg" alt="">Download</li>
                        <li><img src="bookmark-solid-full.svg" alt="">Favorito</li>
                        <li><img src="list-ul-solid-full.svg" alt="">Lista</li>
                        </div>
                    </ul>
                </nav>
            </div>
            <div class="coluna">
                <img src="Capivara bagual.png" alt="">
                <h2>Capivara Bagual no comando</h2>
                <ul>
                    <li>Capivara Bagual é uma raça absoluta que está a beira da onipôtencia. Capaz de superar uma raça suprema</li>
                </ul>
            <form action="" method="get">
                <label for="nome">Usuário</label>
                <input type="text"name="nome" id="">

                <label for="email">Email</label>
                <input type="email"name="email" id="">

                <label for="Cidade">Cidade</label>
                <input type="text"name="nome" id="">

                <label for="nome">Estado</label>
                <input type="text"name="nome" id="">

                <button type="submit">Enviar</button>
            </form>
            </div>
        </div>

    </section>
</body>
</html>