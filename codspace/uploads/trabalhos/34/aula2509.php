<?php

ini_set('display_errors', 0);

$name = $_POST["name"];
$sobrenome = $_POST["sobrenome"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        .container{
            width:300px;
        }

        input{
            width: 100%;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background : #fff;
        }

    </style>
</head>
<body>
    <header>

    </header>

    <div ciass= "container">

    <form action="" method="post">
        <label for="nome ">nome </label>
        <input type="text" name="name" id="">
    
<label for="sobrenome">sobrenome</label>
<input type="text" name="sobrenome" id="">

<label for="email">email </label>
<input type="email"name="email" id="">
 
<label for="cpf">cpf</label>
<input type="text" name="cpf" id="">

<button type="submit">salvar</button>
    </form>

    <div class="resultado">
<?php
 echo "<div> $name </div>";
echo "<div> $sobrenome </div>";
echo "<div>  $email </div>";
echo "<div> $cpf </div>";

?>
    </div>


    </div>
</body>
</html>