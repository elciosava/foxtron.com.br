<?php

ini_set('display_errors', 0);

$nome = $_GET['nome'];
$sobrenome = $_GET['sobrenome'];
$mensagem = $_GET['mensagem'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        header {
            height: 50px;
            padding: 10px;
            background: rgb(155,125,38);
        }
        .inicio {
            background: rgb(255,255,22);
            height: calc(100vh - 70px);
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
        .icones img {
            width: 80px;
            height: 80px;
            margin-left: 20px;
        }
        img {
            width: 400px;
            height: 400px;

        }
        form {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <header>
        <h2>Giovani Emerson</h2>
        
    </header>    
    <section class="inicio">
        <div class="container">
            <div class="coluna"><nav>
            <ul>
                <div class="icones">
                <li><img src="house-solid-full.svg" alt="">inicio</li>
                <li><img src="whatsapp-brands-solid-full.svg" alt="">Conversas</li>
                <li><img src="phone-solid-full.svg" alt="">Contato</li>
                <li><img src="user-solid-full.svg" alt="">Conta</li>
                </div>
    </ul>
    </nav></div>
            <div class="coluna">
        <img src="https://images.unsplash.com/photo-1758642882005-447873fd2d29?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
        <p>O Pico é a montanha mais alta de Portugal, localizada na ilha do Pico, nos Açores. Com 2.351 metros de altitude, o imponente vulcão é um dos maiores símbolos naturais do arquipélago. Envolto frequentemente por nuvens, o Pico oferece vistas deslumbrantes para o oceano Atlântico e ilhas vizinhas. É também um destino popular para amantes da natureza e do montanhismo, que desafiam a subida até ao cume para apreciar o nascer do sol acima das nuvens. Além da beleza natural, a região é conhecida pela produção de vinho, com vinhas plantadas em solos de lava que fazem parte do Patrimônio Mundial da UNESCO.</p>
        <form action="" method="get">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="nome" id="">
            <label for="mensagem">Deixe uma mensagem</label>
            <input type="text" name="mensagem" id="">

            <button type="submit">Enviar</button>
        </form>
        <div class="resultado">
            <?php
            echo "<div> nome </div>";
            echo "<div> sobrenome </div>";
            echo "<div> mensagem </div>";
            ?>
        </div>
        </div>
    </div>
    </section>
</body>
</html>