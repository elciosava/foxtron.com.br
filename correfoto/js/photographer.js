const $=s=>document.querySelector(s);
const money=n=>Number(n).toLocaleString('pt-BR',{style:'currency',currency:'BRL'});
const esc=(v='')=>String(v).replace(/[&<>'"]/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#39;','"':'&quot;'}[c]));
let queue=[];

async function auth(){
  const r=await fetch('../backend/api/auth.php',{cache:'no-store'}),d=await r.json();
  if(!d.user){location.href='../entrar.html';return null}
  if(d.user.role==='admin'){location.href='../admin/';return null}
  if(d.user.role!=='photographer'){location.href='../minha-conta.html';return null}
  $('#photographerName').textContent=d.user.name;
  if(d.user.status!=='active'){
    $('#pendingBox').classList.remove('hidden');return null;
  }
  $('#photographerContent').classList.remove('hidden');return d.user;
}

async function loadPlatformSalesSettings(){
  try{
    const r=await fetch('../backend/api/public_sales_settings.php',{cache:'no-store'}),d=await r.json();
    if(!r.ok||!d.ok)return;
    $('#pPlatformPrice').textContent=money(d.settings.photo_price);
    $('#pPlatformCommission').textContent=`${Number(d.settings.default_photographer_commission)}%`;
  }catch(e){}
}

async function loadEvents(){
  const r=await fetch('../backend/api/events.php',{cache:'no-store'}),d=await r.json();
  $('#pEvent').innerHTML='<option value="">Selecione um evento</option>'+(d.events||[]).filter(e=>e.status==='active').map(e=>`<option value="${e.id}">${esc(e.name)}</option>`).join('');
}

async function loadDashboard(){
  const r=await fetch('../backend/api/photographer_dashboard.php',{cache:'no-store'}),d=await r.json();
  if(!r.ok||!d.ok)return;
  $('#pStatPhotos').textContent=d.stats.photos;
  $('#pStatSold').textContent=d.stats.sold;
  $('#pStatGross').textContent=money(d.stats.gross);
  $('#pStatCommission').textContent=money(d.stats.commission_value);
  $('#pStatPaid').textContent=money(d.stats.paid_out);
  $('#pStatDue').textContent=money(d.stats.balance_due);
  $('#pPhone').value=d.profile?.phone||'';
  $('#pPixKey').value=d.profile?.pix_key||'';

  $('#pPayouts').innerHTML=(d.payouts||[]).length?d.payouts.map(p=>`
    <article class="photographer-payout-row">
      <div><b>Repasse #${p.id}</b><small>${p.item_count} venda(s) vinculada(s) · ${p.paid_at||p.created_at||''}</small></div>
      <div><small>Vendas ${money(p.gross_amount)}</small><strong>${money(p.amount)}</strong></div>
      <span class="status-pill-inline status-${p.status}">${p.status==='paid'?'PAGO':'CANCELADO'}</span>
    </article>`).join(''):'<div class="empty"><b>Nenhum repasse registrado ainda.</b></div>';

  $('#pPhotos').innerHTML=d.photos.length?d.photos.map(p=>`
    <article class="admin-photo-card">
      <img src="../${esc(p.public_path)}" alt="">
      <div class="admin-photo-body"><b>${esc(p.event_name)}</b>
      <small>${p.bib_numbers?'Peito '+esc(p.bib_numbers):'Sem número'} · ${esc(p.ocr_status)}</small>
      <small>${Number(p.sales_count||0)} venda(s)</small></div>
    </article>`).join(''):'<div class="empty"><b>Você ainda não enviou fotos.</b></div>';
}

$('#pFiles').onchange=()=>{
  queue=[...$('#pFiles').files].filter(f=>['image/jpeg','image/png','image/webp'].includes(f.type)).map(f=>({file:f,status:'aguardando',id:null,numbers:''}));
  renderQueue();
};
function renderQueue(){
  $('#pQueueTitle').textContent=`${queue.length} foto(s) selecionada(s)`;
  $('#pQueue').innerHTML=queue.length?queue.map(q=>`<div class="ocr-row"><div class="file"><strong>${esc(q.file.name)}</strong><small>${esc(q.status)}${q.numbers?' · '+esc(q.numbers):''}</small></div></div>`).join(''):'<div class="empty"><b>Nenhuma foto selecionada.</b></div>';
}
async function uploadOne(q,eventId){
  const fd=new FormData();fd.append('photo',q.file);fd.append('event_id',eventId);
  q.status='enviando';renderQueue();
  const r=await fetch('../backend/api/photos.php',{method:'POST',body:fd}),d=await r.json();
  if(!r.ok||!d.ok)throw Error(d.error||'Falha no upload.');
  q.id=d.id;q.status='OCR';renderQueue();
  const or=await fetch('../backend/api/ocr.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({photo_id:q.id})}),od=await or.json();
  if(!or.ok||!od.ok)throw Error(od.error||'Falha no OCR.');
  q.numbers=(od.suggested||[]).join(', ');
  q.status=q.numbers?'revisar':'sem número';
}
$('#pUpload').onclick=async()=>{
  const eventId=$('#pEvent').value;
  if(!eventId)return $('#pMessage').textContent='Selecione um evento.';
  if(!queue.length)return $('#pMessage').textContent='Selecione pelo menos uma foto.';
  $('#pUpload').disabled=true;let ok=0;
  for(const q of queue){
    try{await uploadOne(q,eventId);ok++}catch(e){q.status='erro: '+e.message}
    renderQueue();
  }
  $('#pMessage').textContent=`${ok} foto(s) enviada(s).`;
  $('#pUpload').disabled=false;await loadDashboard();
};

$('#pSaveProfile').onclick=async()=>{
  const button=$('#pSaveProfile');
  button.disabled=true;
  $('#pProfileMessage').textContent='Salvando...';
  try{
    const r=await fetch('../backend/api/photographer_profile.php',{
      method:'PATCH',
      headers:{'Content-Type':'application/json'},
      body:JSON.stringify({phone:$('#pPhone').value.trim(),pix_key:$('#pPixKey').value.trim()})
    }),d=await r.json();
    if(!r.ok||!d.ok)throw Error(d.error||'Não foi possível salvar seus dados.');
    $('#pProfileMessage').textContent='Dados de repasse salvos.';
  }catch(e){
    $('#pProfileMessage').textContent=e.message;
  }finally{
    button.disabled=false;
  }
};

$('#pRefresh').onclick=loadDashboard;
$('#logout').onclick=async()=>{await fetch('../backend/api/auth.php',{method:'DELETE'});location.href='../'};

(async()=>{const u=await auth();if(u){await loadPlatformSalesSettings();await loadEvents();await loadDashboard()}})();
