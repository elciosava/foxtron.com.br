const F$=s=>document.querySelector(s);
const fmoney=n=>Number(n||0).toLocaleString('pt-BR',{style:'currency',currency:'BRL'});
const fesc=(v='')=>String(v).replace(/[&<>'"]/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#39;','"':'&quot;'}[c]));
const fdate=v=>v?new Date(String(v).replace(' ','T')).toLocaleString('pt-BR'):'—';

let financeRows=[];

async function loadPhotographerFinance(){
  const box=F$('#photographerFinance');
  if(!box)return;
  box.innerHTML='<div class="empty"><b>Carregando financeiro...</b></div>';

  try{
    const r=await fetch('../backend/api/admin_photographer_finance.php',{cache:'no-store'}),d=await r.json();
    if(!r.ok||!d.ok)throw Error(d.error||'Erro ao carregar financeiro.');
    financeRows=d.photographers||[];

    const totals=financeRows.reduce((a,p)=>{
      a.gross+=Number(p.gross_sales||0);
      a.earned+=Number(p.earned_commission||0);
      a.paid+=Number(p.paid_out||0);
      a.due+=Number(p.balance_due||0);
      return a;
    },{gross:0,earned:0,paid:0,due:0});

    F$('#financeGrossTotal').textContent=fmoney(totals.gross);
    F$('#financeEarnedTotal').textContent=fmoney(totals.earned);
    F$('#financePaidTotal').textContent=fmoney(totals.paid);
    F$('#financeDueTotal').textContent=fmoney(totals.due);

    box.innerHTML=financeRows.length?financeRows.map(p=>`
      <article class="finance-photographer">
        <div class="finance-person">
          <b>${fesc(p.name)}</b>
          <small>${fesc(p.email)}</small>
          <span>${p.photo_count} foto(s) · ${p.sold_items} venda(s) · comissão atual ${Number(p.current_commission_percent)}%</span>
          ${p.pix_key?`<span>PIX: ${fesc(p.pix_key)}</span>`:'<span class="finance-warning">PIX ainda não informado</span>'}
        </div>
        <div class="finance-values">
          <div><small>VENDAS</small><strong>${fmoney(p.gross_sales)}</strong></div>
          <div><small>COMISSÃO</small><strong>${fmoney(p.earned_commission)}</strong></div>
          <div><small>JÁ PAGO</small><strong>${fmoney(p.paid_out)}</strong></div>
          <div class="finance-due"><small>A PAGAR</small><strong>${fmoney(p.balance_due)}</strong></div>
        </div>
        <div class="finance-actions">
          <button class="outline-btn" data-finance-detail="${p.id}">Ver detalhes</button>
          ${Number(p.balance_due)>0
            ? `<button class="primary" data-finance-pay="${p.id}" data-finance-name="${fesc(p.name)}" data-finance-amount="${Number(p.balance_due)}">Marcar ${fmoney(p.balance_due)} como pago</button>`
            : '<span class="finance-ok">✓ Em dia</span>'}
        </div>
      </article>`).join(''):'<div class="empty"><b>Nenhum fotógrafo cadastrado.</b></div>';

    box.querySelectorAll('[data-finance-detail]').forEach(b=>b.onclick=()=>openFinanceDetail(Number(b.dataset.financeDetail)));
    box.querySelectorAll('[data-finance-pay]').forEach(b=>b.onclick=()=>payPhotographer(
      Number(b.dataset.financePay),
      b.dataset.financeName,
      Number(b.dataset.financeAmount)
    ));
  }catch(e){
    box.innerHTML=`<div class="empty"><b>Erro no financeiro.</b><span>${fesc(e.message)}</span></div>`;
  }
}

async function payPhotographer(id,name,amount){
  if(!confirm(`Confirmar que você já repassou ${fmoney(amount)} para ${name}?\n\nIsso criará um registro de repasse e zerará somente as vendas pendentes atuais.`))return;

  const note=prompt('Observação do repasse (opcional):','')||'';

  try{
    const r=await fetch('../backend/api/admin_photographer_finance.php',{
      method:'POST',
      headers:{'Content-Type':'application/json'},
      body:JSON.stringify({photographer_id:id,notes:note})
    }),d=await r.json();

    if(!r.ok||!d.ok)throw Error(d.error||'Não foi possível registrar o repasse.');

    alert(`Repasse #${d.payout_id} registrado: ${fmoney(d.amount)}.`);
    await loadPhotographerFinance();
    if(typeof loadAdminUsers==='function')loadAdminUsers();
  }catch(e){alert(e.message)}
}

async function openFinanceDetail(id){
  const modal=F$('#financeDetailModal'),body=F$('#financeDetailBody');
  modal?.classList.remove('hidden');
  body.innerHTML='<div class="empty"><b>Carregando...</b></div>';

  try{
    const r=await fetch(`../backend/api/admin_photographer_finance.php?photographer_id=${id}`,{cache:'no-store'}),d=await r.json();
    if(!r.ok||!d.ok)throw Error(d.error||'Erro ao carregar detalhes.');

    F$('#financeDetailTitle').textContent=d.photographer.name;

    const s=d.summary||{};
    body.innerHTML=`
      <div class="finance-detail-summary">
        <article><small>Vendas</small><strong>${fmoney(s.gross_sales)}</strong></article>
        <article><small>Comissão gerada</small><strong>${fmoney(s.earned_commission)}</strong></article>
        <article><small>Já pago</small><strong>${fmoney(s.paid_out)}</strong></article>
        <article><small>A pagar</small><strong>${fmoney(s.balance_due)}</strong></article>
      </div>

      <h3>Vendas</h3>
      <div class="finance-sales-list">${(d.sales||[]).length?(d.sales||[]).map(v=>`
        <div class="finance-row">
          <div><b>Pedido #${v.order_id} · Foto #${v.photo_id}</b><small>${fesc(v.event_name)} · ${fdate(v.paid_at)}</small></div>
          <div><small>Venda ${fmoney(v.unit_price)}</small><strong>${Number(v.commission_percent)}% = ${fmoney(v.commission_amount)}</strong></div>
          <span class="${Number(v.paid_to_photographer)?'status-pill-inline status-paid':'status-pill-inline status-pending'}">${Number(v.paid_to_photographer)?`REPASSE #${v.payout_id}`:'A PAGAR'}</span>
        </div>`).join(''):'<div class="empty"><b>Nenhuma venda paga.</b></div>'}</div>

      <h3>Histórico de repasses</h3>
      <div class="finance-payout-list">${(d.payouts||[]).length?(d.payouts||[]).map(p=>`
        <div class="finance-row">
          <div><b>Repasse #${p.id}</b><small>${p.item_count} item(ns) · ${fdate(p.paid_at)}</small></div>
          <div><small>Vendas vinculadas ${fmoney(p.gross_amount)}</small><strong>${fmoney(p.amount)}</strong></div>
          <span class="status-pill-inline status-${p.status}">${p.status==='paid'?'PAGO':'CANCELADO'}</span>
        </div>`).join(''):'<div class="empty"><b>Nenhum repasse registrado.</b></div>'}</div>
    `;
  }catch(e){
    body.innerHTML=`<div class="empty"><b>${fesc(e.message)}</b></div>`;
  }
}

F$('#refreshFinance')?.addEventListener('click',loadPhotographerFinance);
F$('#closeFinanceModal')?.addEventListener('click',()=>F$('#financeDetailModal')?.classList.add('hidden'));
F$('#financeDetailModal')?.addEventListener('click',e=>{if(e.target.id==='financeDetailModal')e.currentTarget.classList.add('hidden')});

document.addEventListener('DOMContentLoaded',()=>setTimeout(loadPhotographerFinance,400));
