<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        input {
            width: 100%;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh
            
        }
    </style>
</head>
<body>
    <header>

</header>
<div class="container">
    <form action="" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="">

        <label for="sobrenome">Sobrenome</label>
        <input type="text" name="sobrenome" id="">

        <label for="email">Email</label>
        <input type="text" name="email" id="">

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="">

        <button type="submit">Salvar</button>


    </form>

    <div class="resultado">
        <?php
             echo "<div> $nome  </div>";
             echo "<div> $sobrenome  </div>";
             echo "<div> $email  </div>";
             echo "<div> $cpf  </div>";

        ?>

    </div>

</div>
</body>
</html>