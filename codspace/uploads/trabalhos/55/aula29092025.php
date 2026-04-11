<?php

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
        .icones img{
            width: 40px;
            height: 40px;
            margin-left: 20px;
        }
        header {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 50px;
            padding: 10px;
        }
        .icones {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .inicio {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
        .coluna{
            background: grey;
            height: calc(100vh - 70px);
        }
        form{
            width: 350px;
        }
        .coluna input {
            width: 100%;    
        }
        .coluna{
            display: flex;
            justify-content: center;
            padding-top: 40px;
        }

        button {
            padding: 10px 20px;

        }
    </style>
</head>
<body>
    <header>
        <h2>Nakalski</h2>
        <input type="search" name="busca" id="">
        <div class="icones">
            <img src="user-solid-full.svg" alt=""><span>Minha Conta</span>
            <img src="heart-solid-full.svg" alt=""><span>Favoritos</span>
            <img src="cart-shopping-solid-full.svg" alt=""><span>Meu Carrinho</span>
       </div>
    </header>

    <section class="inicio">
        <div class="coluna">
        <form action="" method="get">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="email">Email</label>
            <input type="text" name="email" id="">

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="">

            <button type="submit">Enviar</button>
        </form>
        </div>
        <div class="coluna"></div>
        <div class="coluna"></div>
    </section>

</body>
</html>