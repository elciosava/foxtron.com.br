<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
   * {
        margin: 0;
        padding: 0;
   }
    header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background: rgb(247, 147, 147);
            height: 60px;
            color: white;
        }
    .inicio {
        background: white;
        height: calc(100vh - 80px);
    }
    .container {
        display: grid;
        grid-template-columns: 0.15fr 2fr;
        gap: 10px;
    }
    .coluna {
        height: calc(100vh - 100px);
        background: crimson;
    }
    img {
        width: 750px;
        height: 500px;
        align-items:center;
        margin:20px;
    }
    li img {
        width: 50px;
        height: 50px;
        
    }

    </style>
        <header>
            <h2>pitoco</h2>
        </header>
        
        <section class="inicio">
            <div class="container">
                <div class="coluna">
                  <nav>
                     <ul>
                          <li> <img src="house-solid-full.svg" alt="">inicio</li>
                          <li> <img src="bars-solid-full.svg" alt="">menu</li>
                          <li> <img src="magnifying-glass-solid-full.svg" alt="">pesquisar</li>
                   </ul>
               </nav>
          </div>
                <div class="coluna">
                    <img src="https://www.themoviedb.org/t/p/original/qfMNJxvNcqnpOYjWUfbFwduDiNb.jpg" alt="">
                    <h1>Slipknot é uma banda norte-americana de heavy metal formada em 1995 em Des Moines, Iowa. Eles são conhecidos por seu estilo agressivo, uso de máscaras sinistras e performances intensas que misturam elementos de nu metal, metal alternativo, groove metal e death metal</h1>
                    <label for="texto">qual a sua banda favorita?</label>
                    <input type="text" name="texto" id="">
                </div>
            </div>
        </section>
</body>
</html>