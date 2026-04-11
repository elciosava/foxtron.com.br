<?php
ini_set('diaplay_errors', 0);
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
            margin-left:20px;
        }
        header {
            display:flex;
            justify-content: space-around;
            align-items: center;
        }

        .icones {
            display:flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            padding: 10px;
            margin: 10px;
        }

        .inicio {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .coluna {
            background: grey;
            height: calc(100vh - 70px);
        }

        form {
            width: 350px;
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
            padding: 10px 20px;
            margin-top: 20px;
            background: rgb(255, 160, 0);
        }

    </style>
</head>
<body>
    <header>
       <h2>felipe</h2>
       <input type="search" name="busca" id="">
       <div class="icones">
        <img src="cart.svg" alt=""><span>minha conta</span>
        <img src="heart.svg" alt=""><span>favoritos</span>
        <img src="user.svg" alt=""><span>meu carrinho</span>
       </div>
    </header>

    <section class="inicio">
        <div class="coluna">
            <form action="" class="method">
               <label for="" class="nome">Nome</label>
               <input type="text" name="nome" id="">
                   
               <label for="email">Email</label>
               <input type="email" name="email" id="">

               <label for="senha">senha</label>
               <input type="password" name="senha" id="">

               <button class="enviar">Enviar</button>

            </form> 
          </div>


        <div class="coluna">
        <form action="" class="method">
               <label for="" class="nome">Nome</label>
               <input type="text" name="nome1" id="" value="<?php echo $nome; ?>">
                   
               <label for="email">Email</label>
               <input type="email" name="email1" id="" value="<?php echo $email; ?>">

               <label for="senha">senha</label>
               <input type="password" name="senha1" id="" value="<?php echo $senha; ?>">

               <button class="enviar">Enviar</button>

            </form> 
        </div>
        <div class="coluna"><?php echo $nome; ?><?php echo $email; ?><?php echo $senha; ?></div>
    </section>

</body>
</html>