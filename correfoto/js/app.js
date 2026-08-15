const $=s=>document.querySelector(s);
let photos=[];
let events=[];
let liked=JSON.parse(localStorage.getItem('liked')||'[]');
let cart=JSON.parse(localStorage.getItem('cart')||'[]');
let cartCatalog={};
let searchMode='bib';
const money=n=>Number(n).toLocaleString('pt-BR',{style:'currency',currency:'BRL'});
const esc=(v='')=>String(v).replace(/[&<>'"]/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#39;','"':'&quot;'}[c]));

function photoUrl(p){
  const path=String(p.public_path||'').replace(/^\/+/, '');
  return path || 'https://images.unsplash.com/photo-1552674605-db6ffd4facb5?auto=format&fit=crop&w=1200&q=85';
}
function normalizedPhoto(p){
  return {
    id:Number(p.id),
    eventId:Number(p.event_id),
    title:(p.bib_numbers||p.bib_number)?`Corredor(es) #${String(p.bib_numbers||p.bib_number).replace(/,/g, ', #')}`:'Foto da corrida',
    event:p.event_name||'Evento',
    km:(p.bib_numbers||p.bib_number)?`PEITO ${String(p.bib_numbers||p.bib_number).replace(/,/g, ' · ')}`:'SEM NÚMERO',
    price:Number(p.price||19.90),
    image:photoUrl(p),
    bib:p.bib_numbers||p.bib_number||'',
    capturedAt:p.captured_at||'',
    shirtColor:p.shirt_color||'',
    orientation:'landscape'
  };
}

async function loadEvents(){
  const sel=$('#eventFilter');
  try{
    const r=await fetch('backend/api/events.php',{cache:'no-store'});
    const data=await r.json();
    if(!r.ok||!data.ok) throw new Error(data.error||'Erro ao carregar eventos.');
    events=data.events||[];
    sel.innerHTML='<option value="">Todos os eventos</option>'+events.map(e=>`<option value="${e.id}">${esc(e.name)}</option>`).join('');

    const requested=new URLSearchParams(location.search).get('event_id');
    if(requested && events.some(e=>String(e.id)===String(requested))){
      sel.value=String(requested);
    }
    updateGalleryEventHeader();
  }catch(err){
    sel.innerHTML='<option value="">Erro ao carregar eventos</option>';
    console.error(err);
  }
}

function updateGalleryEventHeader(){
  const title=$('#galleryEventName'),meta=$('#galleryEventMeta');
  if(!title||!meta)return;
  const id=$('#eventFilter')?.value||'';
  const ev=events.find(e=>String(e.id)===String(id));
  if(!ev){
    title.innerHTML='Encontre <em>suas fotos.</em>';
    meta.textContent='Escolha um evento e use os filtros abaixo.';
    document.title='CorreFoto — Encontrar fotos';
    return;
  }
  title.textContent=ev.name;
  const date=ev.event_date?ev.event_date.split('-').reverse().join('/'):'';
  meta.textContent=[date,ev.location].filter(Boolean).join(' · ');
  document.title=`${ev.name} — CorreFoto`;
}

function minutesToClock(total){
  const safe=(total+1440)%1440;
  return `${String(Math.floor(safe/60)).padStart(2,'0')}:${String(safe%60).padStart(2,'0')}`;
}
function freeTimeRange(){
  const value=$('#freeTime')?.value||'';
  if(!/^\d{2}:\d{2}$/.test(value))return null;
  const [h,m]=value.split(':').map(Number),center=h*60+m,win=Number($('#freeWindow')?.value||10);
  if(center-win<0||center+win>=1440)return null;
  return [minutesToClock(center-win),minutesToClock(center+win)];
}
async function loadPhotos(){
  const eventId=$('#eventFilter').value;
  const q=new URLSearchParams();
  if(eventId)q.set('event_id',eventId);

  if(searchMode==='bib'){
    const bib=$('#bib').value.trim();
    if(bib)q.set('bib',bib);
  }else{
    const range=freeTimeRange(),color=$('#shirtColor')?.value||'';
    if(range){q.set('time_from',range[0]);q.set('time_to',range[1]);}
    if(color)q.set('shirt_color',color);
  }

  try{
    $('#resultCount').textContent='Carregando...';
    const r=await fetch('backend/api/photos.php?'+q.toString(),{cache:'no-store'});
    const data=await r.json();
    if(!r.ok||!data.ok)throw new Error(data.error||'Erro ao carregar fotos.');
    photos=(data.photos||[]).map(normalizedPhoto);
    render();
  }catch(err){
    photos=[];render();
    $('#empty').classList.remove('hidden');
    $('#empty').innerHTML=`<b>Não foi possível carregar as fotos.</b><span>${esc(err.message)}</span>`;
  }
}
function render(){
  const q=$('#search').value.toLowerCase();
  const list=photos.filter(p=>`${p.title} ${p.event} ${p.km} ${p.bib}`.toLowerCase().includes(q));
  $('#grid').innerHTML=list.map((p,i)=>`<article class="photo-card ${i===0&&list.length>2?'feature':''}"><div class="photo-media"><img src="${esc(p.image)}" alt="${esc(p.title)}" loading="lazy"><div class="photo-shade"></div><button class="heart ${liked.includes(p.id)?'liked':''}" data-like="${p.id}">${liked.includes(p.id)?'♥':'♡'}</button><span class="km">${esc(p.km)}</span></div><div class="photo-info"><div><h3>${esc(p.title)}</h3><p>⌖ ${esc(p.event)}</p></div><div class="photo-price">${money(p.price)}<br><button class="add" data-add="${p.id}">${cart.includes(p.id)?'Na sacola':'Adicionar'}</button></div></div></article>`).join('');
  $('#empty').classList.toggle('hidden',list.length>0);
  $('#resultCount').textContent=`${String(list.length).padStart(2,'0')} registros`;
  document.querySelectorAll('[data-like]').forEach(b=>b.onclick=()=>{const id=+b.dataset.like;liked=liked.includes(id)?liked.filter(x=>x!==id):[...liked,id];localStorage.setItem('liked',JSON.stringify(liked));render();});
  document.querySelectorAll('[data-add]').forEach(b=>b.onclick=()=>{const id=+b.dataset.add;if(!cart.includes(id))cart.push(id);saveCart();render();openCart();});
}
function saveCart(){localStorage.setItem('cart',JSON.stringify(cart));$('#cartCount').textContent=cart.length;}
async function ensureCartCatalog(){
  if(!cart.length)return;
  const missing=cart.filter(id=>!cartCatalog[id]);
  if(missing.length){
    try{
      const r=await fetch('backend/api/photos.php?ids='+missing.join(','),{cache:'no-store'}),d=await r.json();
      if(r.ok&&d.ok){
        (d.photos||[]).map(normalizedPhoto).forEach(p=>cartCatalog[p.id]=p);
      }
    }catch(e){
      console.error(e);
    }
  }

  // Remove automaticamente IDs antigos/órfãos do localStorage.
  const before=cart.length;
  cart=cart.filter(id=>cartCatalog[id]);
  if(cart.length!==before) saveCart();
}
async function openCart(){await ensureCartCatalog();renderCart();$('#cartDrawer').classList.remove('hidden');}
function renderCart(){
  photos.forEach(p=>cartCatalog[p.id]=p);
  const items=cart.map(id=>cartCatalog[id]).filter(Boolean);
  $('#cartItems').innerHTML=items.length?items.map(p=>`<div class="cart-row"><div><b>${esc(p.title)}</b><small>${esc(p.event)} · ${money(p.price)}</small></div><button class="remove-cart" data-remove="${p.id}">REMOVER</button></div>`).join(''):'<div class="empty" style="margin-top:20px"><b>Sacola vazia.</b><span>Adicione uma foto para começar.</span></div>';
  $('#cartTotal').textContent=money(items.reduce((s,p)=>s+p.price,0));$('#cartCount').textContent=cart.length;
  document.querySelectorAll('[data-remove]').forEach(b=>b.onclick=()=>{cart=cart.filter(x=>x!==+b.dataset.remove);saveCart();renderCart();render();});
}

$('#search').oninput=render;
$('#bib').oninput=e=>{e.target.value=e.target.value.replace(/\D/g,'');loadPhotos();};
$('#eventFilter').onchange=()=>{updateGalleryEventHeader();loadPhotos();};
$('#focusSearch').onclick=()=>{$('#search').focus();location.hash='arquivo'};
$('#cartBtn').onclick=openCart;
$('#menuBtn').onclick=()=>document.querySelector('.nav nav').classList.toggle('mobile-open');
$('#filterBtn')?.addEventListener('click',()=>$('.filters').classList.toggle('show'));
document.querySelectorAll('[data-close-cart]').forEach(b=>b.onclick=()=>$('#cartDrawer').classList.add('hidden'));
$('#checkout').onclick=async()=>{await ensureCartCatalog();if(!cart.length)return alert('Sua sacola está vazia.');$('#checkoutModal').classList.remove('hidden');$('#checkoutName').focus();renderCheckoutSummary();};
function renderCheckoutSummary(){const items=cart.map(id=>cartCatalog[id]).filter(Boolean);$('#checkoutSummary').innerHTML=items.map(p=>`<div><span>${esc(p.title)}</span><b>${money(p.price)}</b></div>`).join('')+`<div class="checkout-total"><span>Total</span><b>${money(items.reduce((s,p)=>s+p.price,0))}</b></div>`}
document.querySelectorAll('[data-close-checkout]').forEach(b=>b.onclick=()=>$('#checkoutModal').classList.add('hidden'));
$('#checkoutForm').onsubmit=async e=>{
  e.preventDefault();
  const btn=$('#createOrder'),name=$('#checkoutName').value.trim(),email=$('#checkoutEmail').value.trim();
  if(!name||!email)return;

  await ensureCartCatalog();
  const validItems=cart.map(id=>cartCatalog[id]).filter(Boolean);
  if(!validItems.length){
    $('#checkoutMessage').textContent='Sua sacola não possui mais fotos válidas. Adicione a foto novamente.';
    $('#checkoutMessage').className='form-message error';
    renderCart();
    return;
  }

  btn.disabled=true;
  btn.textContent='Criando pedido...';
  $('#checkoutMessage').textContent='';
  try{
    const r=await fetch('backend/api/orders.php',{
      method:'POST',
      headers:{'Content-Type':'application/json'},
      body:JSON.stringify({
        customer_name:name,
        customer_email:email,
        items:validItems.map(p=>({photo_id:p.id}))
      })
    }),d=await r.json();
    if(!r.ok||!d.ok)throw Error(d.error||'Erro ao criar pedido.');
    cart=[];saveCart();
    $('#checkoutModal').classList.add('hidden');
    location.href=d.order_url;
  }catch(err){
    $('#checkoutMessage').textContent=err.message;
    $('#checkoutMessage').className='form-message error';
  }finally{
    btn.disabled=false;
    btn.textContent='Criar pedido';
  }
};

function setSearchMode(mode){
  searchMode=mode;
  const free=mode==='free';
  $('#modeBib')?.classList.toggle('active',!free);
  $('#modeFree')?.classList.toggle('active',free);
  $('#bibSearchBox')?.classList.toggle('hidden',free);
  $('#freeSearchBox')?.classList.toggle('hidden',!free);
  if(free)$('#bib').value='';
  loadPhotos();
}
$('#modeBib')?.addEventListener('click',()=>setSearchMode('bib'));
$('#modeFree')?.addEventListener('click',()=>setSearchMode('free'));
$('#freeSearchBtn')?.addEventListener('click',loadPhotos);
$('#freeTime')?.addEventListener('change',()=>searchMode==='free'&&loadPhotos());
$('#freeWindow')?.addEventListener('change',()=>searchMode==='free'&&loadPhotos());
$('#shirtColor')?.addEventListener('change',()=>searchMode==='free'&&loadPhotos());

(async()=>{saveCart();await loadEvents();await loadPhotos();})();
