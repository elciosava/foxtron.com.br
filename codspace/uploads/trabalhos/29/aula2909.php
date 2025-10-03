<?php
ini_set('display_errors', 0);
$nome = $_GET['nome'];
$email = $_GET['email'];
$senha = $_GET['senha'];

$nome2 = $GET['nome2'];
$email2 = $_GET['email2'];
$senha2 = $_GET['senha2'];

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
        .Icones img {
            width: 40px;
            height: 40px;
            margin-left: 20px;
        }
        header {
            display:flex;
            justify-content: space-around;
            align-items: center;
            height: 50px;
            padding: 10px;
        }

        .Icones {
            display:flex;
            justify-content: center;
            align-items: center;

        }
        .inicio{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .coluna{
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
            display: flex;
            justify-content: center;
            padding-top: 40px;
        }

        button {
            padding: 10px 20px;
            margin-top: 20px;
            background: red;
        }
    </style>
</head>
<body>
    <header>
        <h2>Gabriel</h2>
        <input type="search" name="Busca" id="">
        <div class="Icones">
            <img src="user-solid-full.svg" alt=""><span>Minha conta</span>
            <img src="heart-solid-full.svg" alt=""><span>Favorito</span>
            <img src="cart-shopping-solid-full.svg" alt=""><span>Meu carrinho</span>
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

               <button type="submit">enviar</button>



            </form>
        </div>
        <div class="coluna">
        <form action="" method="get">
                <label for="nome2">Nome</label>
                <input type="text" name="nome2" id="" value="<?php echo $nome; ?>">

                <label for="email2">Email</label> 
                <input type="text" name="email2" id="" value="<?php echo $email; ?>">
                <label for="senha2">Senha</label> 
                <input type="password" name="senha2" id="" value="<?php echo $senha; ?>">

               <button type="submit">enviar</button>
        </div>
        </div>
        <div class="coluna">
            <label for=""><php echo $nome2,0; ?></label>
        
        </div>
      </section>
         
</body>
</html>