<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
   * {
    margin: 0;
    padding: 0;
   }
    header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 20px;
            background: rgb(247, 147, 147);
            height: 50px 80px;
            color: white;
        }
    .inicio {
        background: white;
        height: calc(100vh - 70px);
    }
    .container {
        display: grid;
        grid-template-columns: 0.1fr 3fr;
        gap: 10px;
    }
    .coluna {
        height: 100vh;
        background: black;
    }
    li img {
        width: 50px;
        color: white;
        margin: 0;
    }
    .coluna1 {
        background: rgb(247,147,147);
    }
    img {
        width: 500px;
        margin: 25px;
    }
    h2 {
        color: white;
        margin-left: 150px;
    }
    input {
        margin-left: 50px;
        margin-top: 20px;
    }
    </style>
        <header>
            <h2>Oi</h2>
        </header>
        
        <section class="inicio">
            <div class="container">
                <div class="coluna1"><nav>
                <ul>
                    <li><img src="bars.svg" alt="">Menu</li>
                    <li><img src="house.svg" alt="">Inicio</li>
                    <li><img src="search.svg" alt="">Pesquisar</li>
                    <li></li>
                    <li></li>
                </ul>
            </nav></div>
                <div class="coluna">
                    <div class="imagem">
                        <img src="NOOB!.png" alt="">
                        <h2>xXNoobGamer123Xx: Oi</h2>
                        <label for="mensagem">Deixe sua mensagem</label>
                        <input type="text" name="mensagem" id="" value="">
                        <button type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </section>
</body>
</html>