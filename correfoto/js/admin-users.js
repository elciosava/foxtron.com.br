const U$=s=>document.querySelector(s);
const uesc=(v='')=>String(v).replace(/[&<>'"]/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#39;','"':'&quot;'}[c]));
async function loadAdminUsers(){
  const box=U$('#adminUsers');if(!box)return;
  try{
    const r=await fetch('../backend/api/admin_users.php',{cache:'no-store'}),d=await r.json();
    if(!r.ok||!d.ok)throw Error(d.error||'Erro ao carregar usuários.');
    box.innerHTML=d.users.map(u=>`
      <article class="admin-user">
        <div><b>${uesc(u.name)}</b><small>${uesc(u.email)}</small><span>${uesc(u.role)} · ${uesc(u.status)}</span></div>
        ${u.role==='photographer'?`
          <div class="admin-photographer-terms">
            <small>TERMOS</small>
            <span>${u.terms_accepted_at?`✓ Aceitos · ${uesc(u.terms_version||'versão não informada')}`:'⚠ Não registrados'}</span>
          </div>
          <label>Comissão %<input type="number" min="0" max="100" step="0.5" data-user-commission="${u.id}" value="${Number(u.commission_percent||60)}"></label>`:''}
        <div class="admin-user-actions">
          ${u.role==='photographer'&&u.status!=='active'?`<button class="primary" data-approve="${u.id}">Aprovar fotógrafo</button>`:''}
          ${u.status!=='blocked'?`<button class="outline-btn" data-block="${u.id}">Bloquear</button>`:`<button class="outline-btn" data-unblock="${u.id}">Ativar</button>`}
        </div>
      </article>`).join('');
    box.querySelectorAll('[data-approve]').forEach(b=>b.onclick=()=>updateUser(b.dataset.approve,{status:'active',commission_percent:Number(box.querySelector(`[data-user-commission="${b.dataset.approve}"]`)?.value||60)}));
    box.querySelectorAll('[data-block]').forEach(b=>b.onclick=()=>updateUser(b.dataset.block,{status:'blocked'}));
    box.querySelectorAll('[data-unblock]').forEach(b=>b.onclick=()=>updateUser(b.dataset.unblock,{status:'active'}));
    box.querySelectorAll('[data-user-commission]').forEach(i=>i.onchange=()=>updateUser(i.dataset.userCommission,{commission_percent:Number(i.value)}));
  }catch(e){box.innerHTML=`<div class="empty"><b>${uesc(e.message)}</b></div>`}
}
async function updateUser(id,patch){
  const r=await fetch('../backend/api/admin_users.php',{method:'PATCH',headers:{'Content-Type':'application/json'},body:JSON.stringify({id:Number(id),...patch})}),d=await r.json();
  if(!r.ok||!d.ok){alert(d.error||'Falha ao atualizar usuário.');return}
  loadAdminUsers();
}
document.addEventListener('DOMContentLoaded',()=>{
  U$('#refreshUsers')?.addEventListener('click',loadAdminUsers);
  setTimeout(loadAdminUsers,300);
});
