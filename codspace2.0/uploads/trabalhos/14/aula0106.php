<?php
$nome = $_GET['nome'];
$email = $_GET['email']
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form action="" method="get">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="">

        <label for="email" class="email">Email</label>
        <input type="email" name="email" id="">
        <button class="submit">Enviar</button>


    </form> 
            

    <div class="resultado">
        <?php
        echo "<div class='nome'>$nome</div>";
          echo "<div class='email'>$email</div>";
      
        ?>
    </div> 
    </div>
</body>
</html>