<?php
    ini_set('display_errors', 0);
    $nome = $_GET ['nome'];
    $email = $_GET ['email'];
    $senha = $_GET ['senha'];

    $nome1 = $_GET ['nome1'];
    $email1 = $_GET ['email1'];
    $senha1 = $_GET ['senha1'];
    
?>
<!DOCTYPE html>
<html lang="pt-br-">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
       <h2>Hugo Alfred</h2>
       <input type="search" name="busca" id="">
       <div class="icones">

       <img src="users-solid-full.svg" alt=""><span>Minha conta</span>
       <img src="heart-solid-full.svg" alt=""><span>Favoritos</span>
       <img src="cart-shopping-solid-full.svg" alt=""><span>Meu carrinho</span>

       <style>
        *{
            margin:0;
            padding:0;
        }
        .icones img{
            width:40px;
            height:40px;
            margin-left:20px;
           
        
        }

        header{
            display:flex;
            justify-content: space-around;
            align-items:center;
            height:50px;
            padding:10px;
            background:lightblue;

        }

        .icones{
            display:flex;
            justify-content: center;
            align-items:center;
          
           
        }

        .inicio{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:10px;
        }

        .coluna{
            background:gray;
            height:calc(100vh - 70px)
            
        }

        form{
            width:350px;

        }
       .coluna  input{
            width:100%;
            padding:5px;
            font-size:0.9rem;
            background:lightblue;
        }

        .coluna{
            display:flex;
             justify-content:center;
             padding-top: 40px;
        }
        button{
            padding:10px 20px;
            background:lightblue;
            margin-top:20px;
        }


       </style>
     
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
        <div class="coluna"> <form action="" method="get">
             <label for="nome1">Nome</label>
             <input type="text" name="nome1" id=""  value ="<?php  echo $nome; ?>">

             <label for="email">Email</label>
             <input type="email" name="email1" id=""  value ="<?php  echo $email; ?>">

            <label for="senha">Senha</label>
            <input type="password" name="senha1" id=""  value ="<?php echo $senha; ?>">
 
            <button type="submit">Confirme</button>
            </form></div>
        <div class="coluna">
        </form>
        
        <div class="coluna"> <form action="" method="get">
             <label for="nome">Nome</label>
             <input type="text" name="nome1" id=""  value ="<?php  echo $nome1; ?>">

             <label for="email">Email</label>
             <input type="email" name="email1" id=""  value ="<?php  echo $email1; ?>">

            <label for="senha">Senha</label>
            <input type="text" name="senha1" id="" value ="<?php echo $senha1; ?>">
 
            </form></div>
        </div>
    </section>
</body>
</html>