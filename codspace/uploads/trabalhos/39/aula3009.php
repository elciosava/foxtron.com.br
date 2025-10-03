<?php
ini_set('display_errosr', 0);

$nome = $_GET['nome'];
$sobrenome = $_GET['sobrenome'];

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
        header {
            display:flex;
            height: 65px;
            padding: 5px;           
            background:blue;
        }

        .inicio {
            background: blue;
            height: calc(100vh - 65px);
        }

        .conteiner {
            display:grid;
            grid-template-columns: 1fr 3fr;
            gap: 10px;           
        }

        .coluna {
            height: calc(100vh - 70px);
            background: lightblue;
        }

         .icones img {
            width: 40px;
            height: 40px;
            margin-left: 20px
        }

        img {
            width: 500px;
            height: 500px;
            margin-left: 50px;         
        }

        .texto{
           width: 600px;
           margin-left: 50px;
        }

        form {
            margin-left: 50px;
        }
        
        </style>
</head>
<body>
    <header>
        <h2>Liedson barth</h2>
        
    </header>

    <section class="inicio"> 
        <div class="conteiner">
        <div class="coluna">
            <nav>
                <ul>
                    <div class="icones">
                    <li> <img src="house-solid-full.svg" alt=""> Inicio</li>
                    <li> <img src="comment-solid-full.svg" alt=""> Sobre</li>
                    <li> <img src="user-solid-full.svg" alt=""> Usuario</li>
                    <li> <img src="circle-user-solid-full.svg" alt=""> Conta</li>
                    <li> <img src="heart-solid-full.svg" alt=""> contatos</li>
                </ul>
            </nav>
      
        </div>
    
        <div class="coluna">
            <img src="https://images.unsplash.com/photo-1758754169722-620d36fcb76b?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            <div class="texto">
                <p>Acredite em si mesmo: a autoconfiança é a base para o sucesso. Reconheça suas forças, celebre suas conquistas e aprenda com os erros. Use as dificuldades como degraus para alcançar seus objetivos. Se você pode sonhar, pode realizar.</p>
            </div>
           
            <form action="" method="get">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="">

            <label for="mensagem">mensagem</label>
            <input type="text" name="mensagem" id="">
          
            <button type="submit">Enviar</buttton>           
    </form> 
</div>
    <div class="resultados">
        <?php
        echo "<div> nome </div>";
        echo "<div> sobrenome </div>";
        
        ?>
    </div> 
    
    
    
</div>
</section>
</body>
</html>