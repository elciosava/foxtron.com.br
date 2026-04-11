<?php
ini_set("display_errors",0);
$email= $_POST ['email'];
$assunto= $_POST ['assunto'];
$area= $_POST ['area'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 02-03-18</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body{
            display: flex;
            justify-content: center; 
            align-items: center; 
            flex-direction: column;
            background: rgb(255, 255, 255);
}
        .resultado {
            width: 345px;
            border: solid 2px rgb(134, 89, 206);
            padding: 20px;
            background: rgb(185, 145, 248);
            color: #000;
            margin: 10px;
            box-sizing: border-box;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        div {
            margin: 10px 0 0 0;
            padding: 10px 30px 10px 30px;
            background: rgb(234, 223, 250);
        }
    </style>
</head>


<body>
    <div class="container">
    <form action="" method="post">

    <label for="email">Email:</label>
    <input type="email" name="email" id="">

    <label for="assunto">Assunto:</label>
    <input type="text" name="assunto" id="">

    <label for="area">Mensagem:</label>
    <textarea name="area" id=""></textarea>

    <button type="submit">Enviar</button>

    </form>
    </div>
    
    <div class="resultado">
        <?php
        echo ("Email: "), $email ."</br>";
        echo ("Assunto: "), $assunto ."</br>";
        echo ("Text: "),$area ."</br>";
       
        ?>
    </div>
</body>

</html>   