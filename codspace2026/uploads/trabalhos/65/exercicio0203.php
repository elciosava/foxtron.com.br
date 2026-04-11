<?php
ini_set("display_errors",0);


$email= $_POST['email'];
$assunto= $_POST['assunto'];
$mensagem= $_POST['mensagem'];




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cainã</title>


</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="email">email</label>
            <input type="text" name="email" id="">

             <label for="assunto">assunto</label>
            <input number="text" name="assunto" id="">

            <label for="mensagem">mensagem</label>
            <textarea name="mensagem" id="">
              
             </textarea>
            <button type="submit">ENVIAR</button>

            
        </form>
        <div>
            <div class="resultado">
        <?php
        echo $email ."</br>";
        echo $assunto ."</br>";
        echo $mensagem  ."</br>";
       
        ?>
        </div>
</body>
</html>