<?php

  ini_set( 'display_errors', 0);





   $nome = $_POST[ 'nome'];
   $sobrenome = $_POST[ 'sobrenome'];
   $email = $_POST[ 'email'];
   $cpf = $_POST[ 'cpf'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;

        }
        .container{
            width: 300px;
        }

        input {
            width: 100%;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background:  #fff;
        }
          
    </style>
</head>
<body>
    <header>

    <header>

    <div class="container">
        <form action="" method="post">
             <label for="nome">nome</label>
             <input type="text" name="nome" id=" "> 

             <label for="sobrenome">sobrenome</label>
             <input type="text" name="sobrenome" id=" ">

             <label for="email">email</label>
             <input type="text" name="email" id=" ">

             <label for="cpf">cpf</label>
             <input type="text" name="cpf" id=" ">

             <button type="submit">salvar</button>
        </form>

        <div class="resultado"></div>
            <?php
             echo "<div>  $nome  </div>";
             echo "<div> $sobrenome   </div>";
             echo "<div>  $email   </div>";
             echo "<div>  $cpf  </div>";
           ?>    
    </div>
</body>
</html>
