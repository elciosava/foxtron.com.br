<?php
session_start();
if(!isset($_SESSION["usuario_id"])){
  header("Location: login.php");
  exit;
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Travel — Alugue malas com estilo</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #ff4f81;
      --secondary: #00bcd4;
      --text: #222;
      --bg: #fff;
      --muted: #6b6b6b;
      --shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    *{margin:0;padding:0;box-sizing:border-box}
    body{font-family:'Poppins',sans-serif;background:var(--bg);color:var(--text);}
    header {
      display:flex;align-items:center;justify-content:space-between;
      padding:15px 40px;background:#fff;box-shadow:var(--shadow);position:sticky;top:0;z-index:20;
    }
    .logo {font-weight:700;font-size:22px;color:var(--primary);}
    nav a {margin:0 12px;text-decoration:none;color:var(--text);font-weight:500;}
    nav a:hover {color:var(--primary);}
    .actions button, .actions a {
      border:none;border-radius:8px;padding:8px 14px;margin-left:8px;cursor:pointer;
      font-weight:600;text-decoration:none;
    }
    .btn-primary {background:var(--primary);color:#fff;}
    .btn-outline {background:none;border:2px solid var(--primary);color:var(--primary);}
    
    .hero {
      display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;
      padding:60px 8%;background:linear-gradient(90deg,#ffe9ef,#e9f9fb);
    }
    .hero-text{max-width:500px;}
    .hero-text h1{font-size:2.5rem;margin-bottom:15px;color:var(--primary);}
    .hero-text p{color:var(--muted);margin-bottom:25px;font-size:1.1rem;}
    .hero-text button{padding:12px 24px;font-size:1rem;}
    .hero img{width:400px;max-width:90%;border-radius:20px;}
    
    main{max-width:1200px;margin:60px auto;padding:0 20px;}
    h2.section-title{text-align:center;font-size:1.8rem;margin-bottom:30px;color:var(--primary);}
    .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:20px;}
    .card {
      background:#fff;border-radius:12px;box-shadow:var(--shadow);padding:15px;text-align:center;
      transition:transform .2s;
    }
    .card:hover{transform:translateY(-5px);}
    .card img{width:100%;height:200px;object-fit:cover;border-radius:10px;}
    .price{color:var(--secondary);font-weight:600;margin:6px 0;}
    .btn{background:var(--primary);color:#fff;border:none;padding:8px 14px;border-radius:8px;cursor:pointer;}
    
    .benefits{margin:80px auto;text-align:center;}
    .benefits h3{color:var(--primary);margin-bottom:20px;}
    .benefit-list{display:flex;flex-wrap:wrap;justify-content:center;gap:40px;}
    .benefit-item{max-width:250px;}
    .benefit-item img{width:80px;margin-bottom:10px;}
    .benefit-item p{color:var(--muted);}
    footer{text-align:center;padding:30px;color:var(--muted);}
  </style>
</head>
<body>

<header>
  <div class="logo">Travel</div>
  <nav>
    <a href="#">Início</a>
    <a href="#produtos">Malas</a>
    <a href="#vantagens">Vantagens</a>
  </nav>
  <div class="actions">
    <span>👋 Olá, <strong><?php echo htmlspecialchars($_SESSION["usuario_nome"]); ?></strong></span>
    <a href="logout.php" class="btn-outline">Sair</a>
    <a href="carrinho.php" class="btn-primary">🛒 <span id="cartCount">0</span></a>
  </div>
</header>

<section class="hero">
  <div class="hero-text">
    <h1>Viaje leve, alugue sua mala!</h1>
    <p>Escolha entre vários modelos, reserve online e viaje com conforto.  
       Economia, praticidade e sustentabilidade em um só lugar.</p>
    <button class="btn" onclick="scrollToProdutos()">Ver malas</button>
  </div>
  Mala de viagem✈️
</section>

<main id="produtos">
  <h2 class="section-title">Malas disponíveis</h2>
  <div class="grid" id="listaProdutos"></div>
</main>

<section class="benefits" id="vantagens">
  <h3>Por que escolher o Travel?</h3>
  <div class="benefit-list">
    <div class="benefit-item">
      <img src="https://cdn-icons-png.flaticon.com/512/684/684908.png" alt="">
      <p>Evite gastos com malas caras — alugue só quando precisar.</p>
    </div>
    <div class="benefit-item">
      <img src="https://cdn-icons-png.flaticon.com/512/3184/3184760.png" alt="">
      <p>Malas higienizadas e revisadas após cada uso.</p>
    </div>
    <div class="benefit-item">
      <img src="https://cdn-icons-png.flaticon.com/512/3523/3523063.png" alt="">
      <p>Entrega e retirada em domicílio nas principais cidades.</p>
    </div>
  </div>
</section>

<footer>© 2025 AlugaMala — Inspirado em GoCase, design original.</footer>

<script>
const produtos = [
  {id:1,nome:"Mala de Mão Rosa",preco:15,img:"https://static.netshoes.com.br/produtos/mala-de-viagem-madami-de-mao-transversal/18/OWX-0007-018/OWX-0007-018_zoom4.jpg?ts=1601405510&"},
  {id:2,nome:"Mala Média Rosa",preco:18,img:"https://images.tcdn.com.br/img/img_prod/886231/mala_media_24_oslo_rosa_seanite_4085_2_6ee81f34592311bf19bd5fc7c2ca22e5_20231002115042.jpg"},
  {id:3,nome:"Mala Grande Preta",preco:20,img:"https://a-static.mlcdn.com.br/800x560/mala-de-viagem-grande-forrada-semi-rigida-grotaferrata/stocke-commerce/15978089931/68be2c626ad1fe40e6af953067e6eb5d.jpeg"},
  {id:4,nome:"Mala Executiva Preta",preco:17,img:"https://tse1.mm.bing.net/th/id/OIP.cy5u2TFcvGvittw9PadfoAHaHa?w=750&h=750&rs=1&pid=ImgDetMain&o=7&rm=3"}
];
let carrinho = JSON.parse(localStorage.getItem("carrinho")||"[]");

function renderProdutos(){
  const lista = document.getElementById("listaProdutos");
  lista.innerHTML = "";
  produtos.forEach(p=>{
    const div = document.createElement("div");
    div.className="card";
    div.innerHTML=`
      <img src="${p.img}" alt="${p.nome}">
      <h4>${p.nome}</h4>
      <div class="price">R$ ${p.preco.toFixed(2)}/dia</div>
      <button class="btn" onclick="addCarrinho(${p.id})">Alugar</button>`;
    lista.appendChild(div);
  });
  document.getElementById("cartCount").textContent = carrinho.length;
}
function addCarrinho(id){
  const item = produtos.find(p=>p.id===id);
  carrinho.push(item);
  localStorage.setItem("carrinho",JSON.stringify(carrinho));
  renderProdutos();
}
function scrollToProdutos(){ document.getElementById("produtos").scrollIntoView({behavior:'smooth'}); }

renderProdutos();
</script>

</body>
</html>
