<?php 
    ini_set('display_errors', 0);
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
        *{
            margin: 0;
            padding: 0;
        }
        .icones img {
            width:40px;
            height:40px;
            margin-left: 20px;
        }
        header{
            background:LightGrey;
            display:flex;
            justify-content: space-around;
            align-items: center;
            height: 80px;
            padding: 10px;
        }
        .inicio{
            height: calc(100vh - 100px);
            background:	#DCDCDC;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 10px;
        }
        .coluna {
            height: calc(100vh - 100px);
            background: #C0C0C0;
        }
        .coluna img {
            height: 30px;
            width: 40px;
            margin-left: 20px;
        }
        .imagem img{
            height: 550px;
            width: 700px;
            margin-left: 250px;
        }
        .texto {
            margin-left: 200px;
        }
        input {
            width: 50%;
            margin-left: 250px;
        }
        
    </style>
</head>
<body>
    <header>
        <h2> Ana Stelmach </h2>
        <input type="search" name="busca" id="">
        <div class="icones">
            <img src="instagram-brands-solid-full.svg" alt=""> <span>  </span>
            <img src="whatsapp-brands-solid-full.svg" alt=""> <span>  </span>
            <img src="github-brands-solid-full.svg" alt=""> <span>  </span>
        </div>    
    </header>
        
    <section class="inicio">
        <div class="container">
            <div class="coluna">
            <nav>
            <ul>
                <li> <img src="house-solid-full.svg" alt=""> inicio </li>
                <li> <img src="magnifying-glass-solid-full.svg" alt=""> busca  </li>
                <li> <img src="bars-solid-full.svg" alt=""> mais </li>
            </ul>
        </nav>
        </div>
      
            <div class="coluna">   
                <div class="imagem"> <img src="https://m.media-amazon.com/images/S/pv-target-images/81ef275effa427553a847bc220bebe1dc314b2e79d00333f94a6bcadd7cce851.jpg" alt=""> </div>
                <div class="texto"> O Batman é a sombra que protege Gotham, lutando contra o crime com inteligência, coragem e um passado marcado pela dor. </div> 

            <label for="mensagem">  </label>
            <input type="text" name="mensagem" id="">

            <button type="submit"> salvar </button>

        </form>
       </div>
         </div>
        <div class="resultado"> </div>
    </section>
    </div>
</body>
</html>