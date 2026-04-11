<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
    <label for="email">email</label>
     <input type="email" name="email" id="">

    <label for="assunto">Assunto</label><br>
     <input type="text" name="assunto" id="">
    
     <label for="mensagem">mensagem</label>
     <textarea name="mensagem" id=""></textarea>

     <button type="submit">enviar</button>
     <div>
    <form>
        <div>
 <?php
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

echo $email ."<br>";
echo $assunto. "<br>";
echo $mensagem . "<br>";
?>
 </div>
</body>
</html>