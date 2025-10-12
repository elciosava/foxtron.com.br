<?php
  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        *{
     margin:0;
     padding:0;
    
        }

        body{
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            background:lightgreen;      
        }

      section{
        width:100vh;
        height:100vh;
           display:flex;
            justify-content:center;
            align-items:center;
            background:gray;
      }

      form{
     width:400px;

      }

      input{
        width:400px;
        background:lightblue;
      }

      
    </style>
</head>
<body>          
    <section class="usuario">
    <form action="gravarusuario.php" method="post">

    <label for="tipo">Tipo</label>
    <input type="text" name="tipo" id="">

    <label for="prr">Nome</label>
    <input type="text" name="prr" id="">

    <label for="numero">Numero</label>
    <input type="text" name="numero">

    <label for="bairro">Bairro</label>
    <input type="text" name="bairro" id="">

    <label for="cidade">Cidade</label>
    <input type="text" name="cidade" id="">

    <label for="estado">Estado</label>
    <input type="text" name="estado" id="">

   <button type="submit">Enviar</button>
</form>
</section>
</body>
</html>         