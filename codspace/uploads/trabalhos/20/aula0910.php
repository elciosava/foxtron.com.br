<?php
  $nome = $_POST ['nome'];
  $email = $_POST ['email'];
  $senha = $_POST ['senha'];

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
    width:50px;
   justify-content:center;
   
  }

 

 
    </style>
</head>
<body>
    <section class="usuario">
      <div class="container">
     
    <form action="gravarusuario.php" method="post">

      <label for="nome">Nome</label>
      <input type="text" name="nome" id="">

     <label for="email">Email</label>
     <input type="text" name="email" id="">

     <label for="senha">Senha</label>
     <input type="password" name="senha" id="">    
   
     <button type="submit">Enviar</button>
      </div>
    </section>
</body>
</html>