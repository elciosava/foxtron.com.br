<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding: o;
            box-sizing: border-box;
        }
        form{
            width: 250px;
            display: flex;
            flex-direction: column;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        input {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
   <form action="verifica_login.php" method="post">
    <label for="email">email</label>
    <input type="text" name="email" id="">

        <label for="email">senha</label>
    <input type="text" name="senha" id="">

    <button type="submit">Entrar</button>

   </form> 
</body>
</html>