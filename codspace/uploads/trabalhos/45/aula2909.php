<?php 

  $echo = $_GET

?>

<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0:

        }

 .icones img { 
    width: 38px;
    height: 38px;
    margin-left: 18px;

 }

 .icones { 
    display: flex;
    justify-content: space-around;
    align-items: center;

 }

 header { 
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 50px;
    padding: 10px;

 }

 .inicio { 
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;

 }

 .coluna { 
    background: gray;
    height: calc(100vh - 70px);

 }

 form { 
    width: 340px;

 }

 .coluna input { 
    width: 100%;
    padding: 5px;
    font-size: 1.1rem;
 }

 .coluna { 
    display: flex;
    justify-content: center;
    padding-top: 40px;

 }

 button { 
    padding: 10px 20px;
    margin-top: 20px;
    background: black;
    color: white;
 }

    </style>

  </head>
  <body>

    <header>

        <h2>Anderson</h2> 

        <input type="search" name="busca" id="">
        <div class="icones">

            <img src="user-solid-full.svg" alt=""> <span>Minha conta</span>
            <img src="heart-solid-full.svg" alt=""> <span>Favoritos</span>
            <img src="cart-shopping-solid-full.svg" alt=""> <span>Meu carrinho</span>

        </div>

    </header>

    <section class="inicio">

       <div class="coluna">
        <form action="" method="get">
            <label for="nome1">Nome</label>
            <input type="text" name="nome1" id="" >

            <label for="email1">Email</label>
            <input type="email" name="email1" id="" >

            <label for="senha1">Senha</label>
            <input type="password1" name="senha1" id="" >

            <button type="submit">Enviar</button>

        </form></div>

       <div class="coluna"> <form action="" method="get">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="" value="">

            <label for="email">Email</label>
            <input type="email" name="email" id="" value="">

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="" value="">

            <button type="submit">Enviar</button>

        </form></div>

       <div class="coluna"> <form action="" method="get">
        <label for="nome">nome</label>
        <input type="nome" name="nome" id="" value="">

        <label for="email">email</label>
        <input type="email" name="email" id="" value="">

        <label for="senha">senha</label>
        <input type="password" name="senha" id="" value="">
        
    </form></div>

    </section>

  </body>
  </html>