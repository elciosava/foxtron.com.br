<?php
ini_set('display_errors', 0);
$nome = $_GET['nome'];
$email = $_GET['email'];
$senha = $_GET['senha'];

$nome1 = $_GET['nome1'];
$email1 = $_GET['email1'];
$senha1 = $_GET['senha1'];
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * { 
            margin: 0;
            padding: 0;
        }
        .icones img {
            width: 40px;
            height: 40px;
            margin-left: 20px
        }
        header {
            display:flex;
            justify-content: space-around;
            align-items: center;
            height: 50px;
            padding: 10px;
        }
        .icones { 
            display:flex;
            justify-content: space-around;
            align-items: center;
        }
        .inicio {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px
        }
        .coluna {
            background: pink;
            height: calc(100vh - 70px);
        }
        form {
            width: 440px;
        }
        .coluna input {
            width: 100%;
            padding: 5px;
            font-size: 1.1rem;
        }
        .coluna {
            display:flex;
            justify-content: center;
            padding-top: 40px;
        }
        button {
            padding: 8px 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header>
    <h2>Naiara</h2>
    <input type="search" name="" id="">
    <div class="icones">
         <img src="user-solid-full.svg" alt=""><span>Minha conta</span>
         <img src="heart-regular-full.svg" alt=""><span>Favoritos</span>
         <img src="cart-shopping-solid-full.svg" alt=""><span>Carrinho</span>
   </div>
   </header>
   <section class="inicio">
    <div class="coluna">
    <form action="" method="get"> 
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="">

        <label for="email">Email</label>
        <input type="email" name="email" id="">

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="">

        <button type="submit">Enviar</button>
    </form>
    </div>
    <div class="coluna">  <form action="" method="get"> 
        <label for="nome1">Nome</label>
        <input type="text" name="nome1" id="" value="<?php  echo $nome;  ?>">

        <label for="emai1">Email</label>
        <input type="email1" name="email1" id="" value="<?php  echo $email;  ?>">

        <label for="senha1">Senha</label>
        <input type="password" name="senha1" id="" value="<?php  echo $senha  ?>">

        <button type="submit">Enviar</button>
    </form></div>
    <div class="coluna"> <form action="" method="get"> 
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="" disabled value="<?php  echo $nome1;  ?>">

        <label for="email">Email</label>
        <input type="email" name="email" id="" disabled value="<?php  echo $email1;  ?>">

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="" disabled value="<?php  echo $senha1  ?>">

        <button type="submit">Enviar</button>
    </form></div>
   </section>
</body>
</html>