<?php
    ini_set('display_errors', 0);

     $nome = $_POST['nome'];
     $sobrenome = $_POST['sobrenome'];
     $email = $_POST['email'];
     $idade = $_POST['idade'];
     $cpf = $_POST['cpf'];
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
            justify-content: center;
            align-items: center;
        }
        .container{
            width: 100%;
            background: black;
            height: 100%;
            margin: auto;
        }
        input{
            width: 95%;
            margin-left: 2%;
            border-radius: 5px;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            border-radius: 5px;
        }
        label{
            color: rgb(47, 98, 194);   
            margin-left: 2%; 
            border-radius: 5px;
        }
        button{
            margin-left: 2%;
            background: rgb(47, 98, 194);
            width: 95%;
            margin-top: 3%;
            border-radius: 5px;
            height: 30px;
        }
        .resultado{
            color: #fff;
            margin-left: 45%;
        }

        
    </style>
</head>
<body>
    <header>

    </header>

    <div class="container">
        <form action="" method="post">

        <label for="nome">Nome: </label>
            <input type="text" name="nome" id="">   

            <label for="sobrenome">Sobrenome: </label>
            <input type="text" name="sobrenome" id="">  

            <label for="email">email: </label>
            <input type="email" name="email" id="">

            <label for="idade">idade: </label>
            <input type="text" name="idade" id="">  

            <label for="cpf">cpf: </label>
            <input type="text" name="cpf" id="">  

            <button type="submit">enviar</button>

        </form>

    <div class="resultado">
         <?php
             echo "<div>$nome</div>";
             echo "<div>$sobrenome</div>";
             echo "<div>$email</div>";
             echo "<div>$idade</div>";
             echo "<div>$cpf</div>";
         ?>
    </div>
    </div>
</body>
</html>