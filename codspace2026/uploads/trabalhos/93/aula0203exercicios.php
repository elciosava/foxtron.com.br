<?php
ini_set("display_errors",0);

$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST ['mensagem']


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>FORMULÁRIO</h2>

 <div class= "container">
             <form action="" method="post">
            <label for="email"><b>E-mail</b></lael>
            <input type="email" name="email" id="">

            <form action="" method="post">
            <label for="assunto"><b>Assunto</b></lael>
            <input type="text" name="assunto" id="">

            <label for="mensagem"><b>Mensagem</b></label>
            <textarea name="mensagem" id=""></textarea>


<button type="submit">Enviar</button>


   </select>



</form>

<div class="reultado">

 <?php 
          echo $email. "<br>";
          echo $assunto. "<br>";
          echo $mensagem. "<br>";
          
          ?>




    
</body>
</html>
