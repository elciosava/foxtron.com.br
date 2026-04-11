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
        header {
            padding: 5px;
            background: rgb(102, 15, 15);
            height: 50px;
          
        }

        .inicio {
         background: rgb(242, 0, 0);
            height: calc(100vh - 60px);
        }

         .container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 10px;
         }

         .coluna {
            height: calc(100vh - 60px);
            background: purple;
         }

        section {
            height: 100vh;
            background: purple;
        }
        .icones  {
            display: flex;
            justify-content: space-around;
            align-items: center;
           }
       
        

    </style>
</head>
<body>
    <header>
      <h2>Pedro Pacheco</h2>
</header>
 

 <section class="inicio">

    <div class="container">
        <div class="coluna">
             <nav>
                <ul>
                    <div class="icones">
        <li><img src="mug-saucer-solid-full.svg" alt="">Café</li>
         <li><img src="bolt-solid-full.svg" alt="">Raio</li>
     <li><img src="car-solid-full.svg" alt="">Carro</li>
      <li><img src="tree-solid-full.svg" alt="">Árvore</li>
      <li><img src="house-solid-full.svg" alt="">Casa</li>
      </div>
    </ul>
    

  </nav>

        </div>
        <div class="coluna">
         
            <nav> <ul>  <div class="img">
                    <li><img src="https://tse1.mm.bing.net/th/id/OIP.6-27dNxjGG08Sgn4o_zRKAHaE8?rs=1&pid=ImgDetMain&o=7&rm=3" alt=""></li>
                  <div class="texto">Neymar começou sua carreira no Santos FC, onde se destacou como uma das maiores revelações do futebol brasileiro. Até hpje se destaca rm jogos, um dos maiores futebolistas, sua ginga e seus dribles são o que encantam.</div>  
                  </div>
                </ul>
            </nav>
        </div>
    </div>
 </section>
</body>
</html>