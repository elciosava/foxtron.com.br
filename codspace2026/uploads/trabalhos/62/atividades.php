<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Loja aleman fiert </title>
<style>
    body{
        font-family: Arial;
       margin:0;
     background:#f4f4f4;
}

header{
       background:#111;
          color:white;
             display:flex;
       justify-content:space-between;
          padding:20px;
}

.produtos{
        display:flex;
           gap:20px;
              padding:20px;
        justify-content:center;
}

.produto{
      background:white;
        padding:15px;
     border-radius:10px;
           text-align:center;
     width:200px;
}

.produto img{
width:100%;
}

button{
      background:#28a745;
     color:white;
         border:none;
     padding:10px;
       cursor:pointer;
}

button:hover{
background:#218838;
}

.carrinho{
position:fixed;
        right:-400px;
        top:0;
            width:300px;
       height:100%;
     background:white;
        box-shadow:-3px 0 10px rgba(0,0,0,0.2);
     padding:20px;
          transition:0.3s;
}

.produtos{
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
</style>
<link rel="stylesheet" href="style.css">
</head>

<body>

     <header>
       <h1>⚽ Polter-Shirts  </h1>
          <button onclick="verCarrinho()">🛒 Carrinho (<span id="contador">0</span>)</button>
       </header>

      <section class="produtos">

<div class="produto">
<img src="corinthians.png">
<h2> Corinthians</h2>
<p>R$ 89,90</p>
<button onclick="comprar(' Corinthians,89.90)">Comprar</button>
</div>

<div class="produto">
<img src="iguaçu.png">
<h2> Iguaçu</h2>
<p>R$ 89,90</p>
<button onclick="comprar(' Iguaçu,89.90)">Comprar</button>
</div>

<div class="produto">
<img src="palmeiras.webp">
<h2> palmeiras</h2>
<p>R$ 89,90</p>
<button onclick="comprar(' Palmeiras,89.90)">Comprar</button>
</div>

<div class="produto">
<img src="Flamengo.png">
<h2> Flamengo</h2>
<p>R$ 0,99</p>
<button onclick="comprar(' Flamengo,0.99)">Comprar</button>
</div>

<div class="produto">
<img src="Barcelona.png">
<h2> Barcelona</h2>
<p>R$ 89,99</p>
<button onclick="comprar(' Barcelona',89.90)">Comprar</button>
</div>

<div class="produto">
<img src="real madri.webp">
<h2> Real Madrid</h2>
<p>R$ 89,99</p>
<button onclick="comprar(' Real Madrid',89.90)">Comprar</button>
</div>

<div class="produto">
<img src="ibis.png">
<h2> Ibis futboll</h2>
<p>R$ 34,99</p>
<button onclick="comprar(' Ibis futboll ',34.99)">Comprar</button>
</div>

<div class="produto">
<img src="Mirassol.png">
<h2> Mirassol</h2>
<p>R$ 89,99</p>
<button onclick="comprar(' Mirassol',89.90)">Comprar</button>
</div>

<div class="produto">
<img src="alemanha.png">
<h2> Alemanha</h2>
<p>R$ 89,99</p>
<button onclick="comprar(' Alemanha',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="Holanda.png">
<h2> Holanda</h2>
<p>R$ 89,99</p>
<button onclick="comprar(' Holanda',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="Brasil.png">
<h2> Brasil</h2>
<p>R$ 89,99</p>
<button onclick="comprar(' Brasil',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="Portugal.png">
<h2> Portugal</h2>
<p>R$ 89,99</p>
<button onclick="comprar(' Portugal',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="Itália.png">
<h2> Itália</h2>
<p>R$ 89,99</p>
<button onclick="comprar(' Itália',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="Croácia.png">
<h2> Croácia</h2>
<p>R$ 89,99</p>
<button onclick="comprar(' Croácia',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="Catar.png">
<h2>Camisa Catar</h2>
<p>R$ 89,99</p>
<button onclick="comprar('Camisa Catar',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="Escócia.png">
<h2>Camisa Escócia</h2>
<p>R$ 89,99</p>
<button onclick="comprar('Camisa Escócia',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="Vasco.png">
<h2>Vasco</h2>
<p>R$ 89,99</p>
<button onclick="comprar('Vasco',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="Chapecoense.png">
<h2>Chapecoense</h2>
<p>R$ 89,99</p>
<button onclick="comprar('Chapecoense',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="Cruzeiro.png">
<h2>Cruzeiro</h2>
<p>R$ 89,99</p>
<button onclick="comprar('Cruzeiro',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="Santos.png">
<h2>Santos</h2>
<p>R$ 89,99</p>
<button onclick="comprar('Santos',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="Athletico pr png.webp">
<h2>Athletico pr</h2>
<p>R$ 89,99</p>
<button onclick="comprar('Athletico pr',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="AtleticoMineiro.png">
<h2>Athletico Mineiro</h2>
<p>R$ 89,99</p>
<button onclick="comprar('Athletico Mineiro',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="SaoPaulo.png">
<h2>São Paulo</h2>
<p>R$ 89,99</p>
<button onclick="comprar('São Paulo',89.99)">Comprar</button>
</div>

<div class="produto">
<img src="Bahia.png">
<h2>Bahia</h2>
<p>R$ 89,99</p>
<button onclick="comprar('Bahia',89.99)">Comprar</button>
</div>


<div id="carrinho" class="carrinho">
<h2>Seu Carrinho</h2>
<ul id="lista"></ul>
<p id="total"></p>
<button onclick="fecharCarrinho()">Fechar</button>
</div>

<script src="script.js"></script>

<section id="formulario">
    
</section>

        </body>  
         </html>