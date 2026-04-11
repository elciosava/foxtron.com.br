
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Meu Carrinho — Travel</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    body{font-family:'Poppins',sans-serif;background:#fafafa;margin:0;padding:0;color:#222;}
    header{padding:20px;background:#fff;box-shadow:0 2px 8px rgba(0,0,0,0.1);text-align:center;font-weight:700;color:#ff4f81;}
    main{max-width:800px;margin:40px auto;background:#fff;padding:20px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);}
    .item{display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid #eee;padding:10px 0;}
    img{width:80px;height:80px;object-fit:cover;border-radius:8px;margin-right:15px;}
    .info{flex:1;}
    .total{font-weight:700;font-size:1.2rem;margin-top:20px;text-align:right;color:#00bcd4;}
    .btn{background:#ff4f81;color:#fff;border:none;padding:10px 20px;border-radius:8px;cursor:pointer;font-weight:600;text-decoration:none;}
    .btn:hover{opacity:0.9;}
    footer{text-align:center;margin-top:40px;color:#888;}
  </style>
</head>
<body>

<header>🛒 Meu Carrinho</header>

<main id="conteudo">
  <p>Carregando carrinho...</p>
</main>

<footer>
  <a href="malas.html" class="btn">← Continuar comprando</a>
</footer>

<script>

const carrinho = JSON.parse(localStorage.getItem("carrinho") || "[]");
const conteudo = document.getElementById("conteudo");

if(carrinho.length === 0){
  conteudo.innerHTML = "<p>Seu carrinho está vazio.</p>";
} else {
  let total = 0;
  conteudo.innerHTML = carrinho.map(item => {
    total += item.preco;
    return `
      <div class="item">
        <img src="${item.img}" alt="${item.nome}">
        <div class="info">
          <strong>${item.nome}</strong><br>
          <small>R$ ${item.preco.toFixed(2)}/dia</small>
        </div>
        <button class="btn" onclick="removerItem(${item.id})">Remover</button>
      </div>
    `;
  }).join('') + `<div class="total">Total: R$ ${total.toFixed(2)}</div>
  <div style="text-align:right;margin-top:20px;">
    <button class="btn" onclick="finalizarPedido()">Finalizar Pedido</button>
  </div>`;
}

function removerItem(id){
  const novo = carrinho.filter(i => i.id !== id);
  localStorage.setItem("carrinho", JSON.stringify(novo));
  location.reload();
}

function finalizarPedido(){
  alert("Simulação: pedido enviado com sucesso!");
  localStorage.removeItem("carrinho");
  location.href = "mala.html";
}
</script>

</body>
</html>
