<?php

$nome = $_GET['nome'];
$email = $_GET['email'];
$senha = $_GET['senha'];

$nome1 = $_GET['nome1'];
$email1= $_GET['email1'];
$senha1 = $_GET['senha1'];
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
        .icones img {

            width: 40px;
            height: 40px;
            margin-left: 20px;
        }
        header{
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 50px;
            padding: 10px;
        }
         .icones{
            display: flex;
            justify-content: center;
            align-items: center;
         }
         .inicio{
            display: grid;
            grid-template-columns: repeat(3,1fr);
          gap: 10px;
         }
         .coluna{
            background: blueviolet;
            height: calc(100vh - 70px);
         }

        .coluna input {
            width: 100%;
            padding: 5px;
            font-size: 1.1rem;
         }
         form{
            width: 350px;
         }
         .coluna{
            display: flex;
            justify-content: center;
            padding-top: 40px;
         }
         .button{
            padding: 10px 20px;
            margin-top: 20px;
            background:rgb(255, 160, 0)
         }
         
    </style>
</head>

<body>
    <header>
        <h2>guilherme</h2>
        <input type="search" name="" id="">
        <div class="icones">

            <img src="user-solid-full.svg" alt=""><span>minha conta</span>
            <img src="heart-solid-full.svg" alt=""><span>favoritos</span>
            <img src="cart-plus-solid-full.svg" alt=""><span>meu carrinho</span>

        </div>
    </header>
    <section class="inicio">
      <div class="coluna"> 
        <form action="">
            <label for="nome">nome</label>
            <input type="text" name="nome" id="">

            <label for="email">email</label>
            <input type="email" name="email" id="">

            <label for="senha">senha</label>
            <input type="passworld" name="senha" id="">

            <button type="submit">enviar</button>
        </form>
      </div>
      <div class="coluna"><form action="">
            <label for="nome">nome</label>
            <input type="text" name="nome" id=""  value="<?php echo $nome; ?>">

            <label for="email">email</label>
            <input type="email" name="email" id=""  value="<?php echo $email; ?>">

            <label for="senha">senha</label>
            <input type="passworld" name="senha" id=""  value="<?php echo $senha; ?>">

            <button type="submit">enviar</button>
        </form>
        </div>
      <div class="coluna"><form action="">
            <label for="nome">nome</label>
            <input type="text" name="nome" id="" disabled value="<?php echo $nome1; ?>">

            <label for="email">email</label>
            <input type="email" name="email" id="" disabled value="<?php echo $email1; ?>">

            <label for="senha">senha</label>
            <input type="passworld" name="senha" id="" disabled value="<?php echo $senha1; ?>">

            <button type="submit">enviar</button>
        </form>
   
           
        </div>
    
</section>
</body>
</html>