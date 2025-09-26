<?php

 ini_set('display_erros' , 0);

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$CPF = $_POST['CPF'];

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
      margin:0;
      padding:0;
        }
        .container{
            width: 300px;
        }

        input{
            width:100%;
        }
        body{
        display:flex;
        justify-self: center;
        align-self:center;
        height: 100vh;
        
        }
    </style>

</head>
<body>

    <header>

    <header>

    <div class="container">
        <form action=""method="post">
        <label for="nome">Nome</label>
        <input type="text" name="Nome"id="">
       
        <label for="sobrenome">sobrenome</label>
         <input type="sobrenome" name="sobrenome"id="">
        
        <label for="email">Email</label>
        <input type="text" name="email" id="">
         
        <label for="CPF">CPF</label>
        <input type="text" name="CPF" id="">

        <button type="Enviar">salvar</button>

        </form>
       <div class="resultado">
       <?php
       echo "<div> $nome </div>";
       echo "<div> $sobrenome</div>";
       echo "<div> $email </div>";
       echo"<div> $CPF </div>";
       ?>
       </div>
    </div>
    
</body>
</html>
