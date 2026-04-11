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
            padding:0;
            margin:0;
        }
        body {
            background: #5EB0D3;
            font-family: Verdana;
            
        }
        input {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 2px;
            
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 375px;
            
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
                    <input type="email" name="email" id="">

                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="">

                    <button type="submit">Salvar</button>
                </form>
                
        </div>
    </section>
</body>
</html>