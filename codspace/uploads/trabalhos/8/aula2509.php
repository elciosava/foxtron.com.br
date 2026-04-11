<?php 

    ini_set('display_errors', 0);
  
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST["email"];
    $cpf = $_POST['cpf'];


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 300px;
        }
        input {
            width: 100%;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #fff;
        }
    </style>

</head>
<body>

<header>
    
</header>

        <div class="container">

            <form action="" method="post">
           
                <label for="nome">Nome</label>
                <input typ="text" name="nome" id="">
            
                <label for="sobrenome">SobreNome</label>
                <input typ="text" name="sobrenome" id="">
            
                <label for="email">Email</label>
                <input typ="email" name="email" id="">

                <label for="cpf">CPF</label>
                <input typ="text" name="cpf" id="">

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