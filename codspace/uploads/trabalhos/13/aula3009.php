<?php
ini_set('display_errors', 0);

$nome = $_GET['nome'];
$sobrenome = $_GET['sobrenome'];
$mensagem = $_GET['mensagem'];
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
       header {
           
            height: 75px;
            padding: 10px;
           background: rgb(77, 150, 77);

        }
        .inicio {
            height: calc(100vh - 75px);
            background: rgb(114, 187, 114);
        }
        .container {
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 10px;
        }
        .coluna {
            height: calc(100vh - 75px);
            background: rgb(33, 92, 33);
        }
      .icones img {
            width:80px;
            height: 80px;
            margin-left: 20px;
           
        }
        img {
            width:400px;
            height: 400px; 
        }
        form{
           
            display: flex;
            justify-content: center
        }

    </style>
</head>
<body>
    <header>
    <h2>Raul Karvat</h2>
    </header>
    <section class="inicio">
        <div class="container">
            <div class="coluna">
            <nav>
            <ul>
                <div class="icones">
                <li><img src="house).svg" alt="">Inicio</li>
                <li><img src="whatsapp.svg" alt="">Conversas</li>
                <li><img src="phone.svg" alt="">Contato</li>
                <li><img src="user.svg" alt="">Conta</li>
                </div>
            </ul>
        </nav>
            </div>
            <div class="coluna">
                <img src="https://images.unsplash.com/photo-1758012561437-5e272eb9e1d1?q=80&w=1075&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
        <p>🌳 A importância das florestas para o planeta
As florestas são ecossistemas vitais que cobrem cerca de 30% da superfície terrestre e desempenham um papel essencial na manutenção da vida no planeta. Elas abrigam mais de 80% das espécies terrestres de animais, plantas e fungos, sendo consideradas verdadeiros berçários da biodiversidade. Além disso, são fundamentais para o equilíbrio climático, atuando como grandes reservatórios de carbono e reguladores do ciclo da água.</p>
<form action="" method="get">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="">

                <label for="mensagem">Deixe uma mensagem</label>
                <input type="text" name="mensagem" id="">

                <button type="submit">Enviar</button>
            </form>
            <div class="resultado">
            <?php
            echo "<div> nome </div>";
            echo "<div> sobrenome </div>";
            echo "<div> mensagem </div>";
           
            ?>
        </div>
            </div>
        </div>
    <section>
</body>
</html>