const $=s=>document.querySelector(s);
const money=n=>Number(n).toLocaleString('pt-BR',{style:'currency',currency:'BRL'});
const esc=(v='')=>String(v).replace(/[&<>'"]/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#39;','"':'&quot;'}[c]));

async function init(){
  const ar=await fetch('backend/api/auth.php',{cache:'no-store'}),ad=await ar.json();
  if(!ad.user){location.href='entrar.html';return}
  $('#accountName').textContent=ad.user.name;
  $('#accountEmail').textContent=ad.user.email;

  if(ad.user.role==='admin'){location.href='admin/';return}
  if(ad.user.role==='photographer'){location.href='fotografo/';return}

  const r=await fetch('backend/api/account_orders.php',{cache:'no-store'}),d=await r.json();
  if(!r.ok||!d.ok){$('#myOrders').innerHTML=`<div class="empty"><b>${esc(d.error||'Erro ao carregar pedidos.')}</b></div>`;return}
  $('#myOrders').innerHTML=d.orders.length?d.orders.map(o=>`
    <article class="account-order">
      <div><small>PEDIDO #${o.id}</small><b>${money(o.total)}</b><span class="order-status ${o.status==='paid'?'paid':''}">${o.status==='paid'?'PAGO':o.status==='cancelled'?'CANCELADO':'PENDENTE'}</span></div>
      <a class="outline-btn" href="pedido.html?token=${encodeURIComponent(o.public_token)}">Ver pedido</a>
    </article>`).join(''):'<div class="empty"><b>Você ainda não possui pedidos.</b><span>Quando comprar uma foto ela aparecerá aqui.</span></div>';
}
$('#logout').onclick=async()=>{await fetch('backend/api/auth.php',{method:'DELETE'});location.href='./'};
init();
