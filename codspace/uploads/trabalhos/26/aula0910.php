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
        *{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 800px;
        }
        input{
            width: 100%;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #48cf00;
        }
    </style>
</head>
<body>
    <header>
        
    </header>

    <section class="usuario">
        <div class="container">
                <form action="gravarusuario.php" method="post">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="">

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="">

                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="">

                    <button type="submit">Salvar</button>
                    <button type="submit">Limpar</button>

                </form>
                <div class="resultado">
                    <div> <?php echo $nome ?></div>
                    <div> <?php echo $email ?></div>
                    <div> <?php echo $senha ?></div>
                </div>
            </div>
</body>
</html>