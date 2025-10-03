<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .inicio{
            height: calc(100vh - 70px);
            background-color: while;
        }
        header{
            height: 60px;
            background: blanchedalmond;
        }
        .container{
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 10px;
        } 
        .coluna{
            height: calc(100vh - 70px);
            background-color: aquamarine;
        }
    </style>
</head>
<body>
    <header>
        <h2>Flavia</h2>
    </header>
    <section class="inicio">
        <div class="container">
            <div class="coluna">
                <img src="52649649091_e401e881fa_c-1.jpg" alt="Imagem básica" style="display:block; margin: 20px auto;">
            </div>
            <div class="coluna">
                <p style="padding: 20px; font-size: 40px;">Santos Futebol Clube</p>
            </div>   
        </div>
        <nav>
        </nav>
    </section>
</body>
</html>