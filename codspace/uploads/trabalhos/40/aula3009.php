<?php
ini_set('display_errors', 0);

$nome = $_GET['nome'];
$sobrenome = $_GET['sobrenome'];
$mensagem = $_GET['mensagem'];
?>

<!DOCTYPE html>
<html lang="en">
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
        display: flex;
            justify-content: space-between;
            background-color: rgb(255, 163, 213);
            height: 70px;
            padding: 10px;
    }
  
      .inicio {
   background: lightyellow;
        height: calc(100vh - 80px);
      }

      .container {
        display:grid;
        grid-template-columns: 1fr 3fr;
        gap: 10px;
      }

      .coluna {
        height: calc(100vh - 70px);
        background: lightblue;
      }

     .icones img {
        width: 35px;
        height: 35px;
        margin-left: 15px;
      }

      img {
        width: 400px;
        height: 400px;
      }

      .texto {
            width: 800px;
        }
   </style>
</head>
<body>
    <header>
       <h2>LalaLand</h2>
       
    </header>

    <section class="inicio">
        <div class="container">
            <div class="coluna">
            <nav>
                <ul>
                    <div class="icones">
                    <li><img src="house-solid-full.svg" alt=""> inicio</li>
                    <li><img src="image-solid-full.svg" alt=""> fotos</li>
                    <li><img src="comment-solid-full.svg" alt=""> conversas</li>
                    <li><img src="heart-solid-full.svg" alt=""> amei</li>
                    <li><img src="font-awesome-brands-solid-full.svg" alt=""> salvos</li>
                    </div>
                </ul>
            </nav>
          </div>
            <div class="coluna">
             <img src="https://images.unsplash.com/photo-1753660770721-a50a6185efc9?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
              <div class="texto">
                <p>Não mais me deitar no feno perfumado ou deslizar na neve deserta.
Onde eu exatamente me encontro?
O que me surpreende é a impressão de não ter envelhecido, embora eu esteja instalada na velhice.
O tempo é irrealizável.
Provisoriamente o tempo parou para mim.
Provisoriamente.
Mas eu não ignoro as ameaças que o futuro encerra, como também não ignoro que é o meu passado que define a minha abertura para o futuro.
O meu passado é a referência que me projeta e que eu devo ultrapassar.
sPortanto, ao meu passado, eu devo o meu saber e a minha ignorância, as minha necessidades, as minhas relações, a minha cultura e o meu corpo...</p>
<form action="" method="get">
    <label for="nome">nome</label>
    <input type="text" name="nome" id="">

    <label for="sobrenome">sobrenome</label>
    <input type="text" name="sobrenome" id="">

    <label for="mensagem">mensagem</label>
    <input type="text" name="mensagem" id="">

    <button>Enviar</button>
</form>
             <div class="resultado">
                <?php
                echo "<div>nome</div>";
                echo "<div>sobrenome</div>";
                echo "<div>mensagem</div>";
                ?>
             </div>
              </div>

            </div>
    </section>
</body>
</html>