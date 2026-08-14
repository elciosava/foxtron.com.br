const A$=s=>document.querySelector(s);
let adminPage=1,adminPages=1;
const adminEsc=(v='')=>String(v).replace(/[&<>'"]/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#39;','"':'&quot;'}[c]));
const statusLabel=s=>({pending:'Pendente',review:'Revisar',none:'Sem número',confirmed:'Confirmada',error:'Erro'}[s]||s);
const adminColors=['preto','branco','cinza','vermelho','azul','verde','amarelo','laranja','roxo','rosa','marrom','multicolor','outro'];
const datetimeLocal=v=>v?String(v).replace(' ','T').slice(0,16):'';
const colorOptions=(selected='')=>'<option value="">Não informado</option>'+adminColors.map(c=>`<option value="${c}" ${c===selected?'selected':''}>${c.charAt(0).toUpperCase()+c.slice(1)}</option>`).join('');

async function loadStats(){
  try{
    const r=await fetch('../backend/api/admin_stats.php',{cache:'no-store'}),d=await r.json();
    if(!r.ok||!d.ok)return;
    [['statEvents',d.events],['statPhotos',d.photos],['statReview',d.review],['statConfirmed',d.confirmed],['statErrors',d.errors]].forEach(([id,v])=>{const el=A$('#'+id);if(el)el.textContent=String(v??0)});
  }catch{}
}

function selectedBibs(photo){
  return (photo.bibs||[]).filter(b=>Number(b.confirmed)===1).map(b=>String(b.bib_number));
}
function candidateBadges(photo){
  return (photo.bibs||[]).filter(b=>Number(b.confirmed)!==1).slice(0,6).map(b=>`<button type="button" class="library-candidate" data-admin-pick="${photo.id}" data-value="${adminEsc(b.bib_number)}">${adminEsc(b.bib_number)} <small>${Math.round(Number(b.confidence||0))}%</small></button>`).join('');
}
function renderAdminPhotos(photos,total){
  const box=A$('#adminPhotoGrid');
  A$('#adminPhotoTotal').textContent=`${total} foto(s)`;
  if(!photos.length){box.innerHTML='<div class="empty admin-photo-empty"><b>Nenhuma foto encontrada.</b><span>Ajuste os filtros ou envie novas fotos.</span></div>';return;}
  box.innerHTML=photos.map(p=>{
    const nums=selectedBibs(p).join(', ');
    return `<article class="admin-photo-card" data-admin-card="${p.id}">
      <div class="admin-photo-media"><img src="../${adminEsc(p.public_path)}" alt=""><span class="status-pill status-${adminEsc(p.ocr_status)}">${adminEsc(statusLabel(p.ocr_status))}</span></div>
      <div class="admin-photo-body">
        <div class="admin-photo-title"><b>#${p.id}</b><small>${adminEsc(p.event_name)}</small></div>
        <div class="library-candidates">${candidateBadges(p)}</div>
        <label>Número(s) confirmado(s)<input data-admin-bibs="${p.id}" value="${adminEsc(nums)}" placeholder="381, 742"></label>
        <div class="admin-photo-meta">
          <label>Horário da foto<input type="datetime-local" data-admin-time="${p.id}" value="${adminEsc(datetimeLocal(p.captured_at))}"></label>
          <label>Cor da camiseta<select data-admin-color="${p.id}">${colorOptions(p.shirt_color||'')}</select></label>
        </div>
        <div class="admin-photo-actions">
          <button class="outline-btn" type="button" data-save-photo="${p.id}">Salvar</button>
          <button class="outline-btn" type="button" data-reocr-photo="${p.id}">Reprocessar OCR</button>
          <button class="danger-btn" type="button" data-delete-photo="${p.id}">Excluir</button>
        </div>
        <p class="admin-photo-message" data-admin-msg="${p.id}"></p>
      </div>
    </article>`;
  }).join('');
  bindAdminPhotoActions();
}

async function loadAdminPhotos(page=1){
  adminPage=page;
  const q=new URLSearchParams({page:String(page),limit:'24'});
  const ev=A$('#libraryEvent')?.value||'',st=A$('#libraryStatus')?.value||'',bib=(A$('#libraryBib')?.value||'').replace(/\D/g,''),color=A$('#libraryColor')?.value||'';
  if(ev)q.set('event_id',ev);if(st)q.set('status',st);if(bib)q.set('bib',bib);if(color)q.set('shirt_color',color);
  A$('#adminPhotoGrid').innerHTML='<div class="empty admin-photo-empty"><b>Carregando...</b><span>Consultando o banco.</span></div>';
  try{
    const r=await fetch('../backend/api/admin_photos.php?'+q,{cache:'no-store'}),d=await r.json();
    if(!r.ok||!d.ok)throw Error(d.error||'Falha ao carregar fotos.');
    adminPages=d.pages||1;renderAdminPhotos(d.photos||[],d.total||0);
    A$('#libraryPageInfo').textContent=`Página ${adminPage} de ${adminPages}`;
    A$('#libraryPrev').disabled=adminPage<=1;A$('#libraryNext').disabled=adminPage>=adminPages;
  }catch(e){A$('#adminPhotoGrid').innerHTML=`<div class="empty admin-photo-empty"><b>Erro ao carregar.</b><span>${adminEsc(e.message)}</span></div>`;}
}

function cardMessage(id,text,error=false){const el=document.querySelector(`[data-admin-msg="${id}"]`);if(el){el.textContent=text;el.className='admin-photo-message '+(error?'error':'success')}}
async function savePhotoBibs(id){
  const input=document.querySelector(`[data-admin-bibs="${id}"]`);
  const time=document.querySelector(`[data-admin-time="${id}"]`)?.value||'';
  const color=document.querySelector(`[data-admin-color="${id}"]`)?.value||'';
  const nums=[...new Set((input.value||'').split(/[,;\s]+/).map(v=>v.replace(/\D/g,'')).filter(Boolean))];
  try{
    const r=await fetch('../backend/api/photos.php',{method:'PATCH',headers:{'Content-Type':'application/json'},body:JSON.stringify({id:Number(id),bib_numbers:nums,captured_at:time,shirt_color:color})}),d=await r.json();
    if(!r.ok||!d.ok)throw Error(d.error||'Falha ao salvar.');
    cardMessage(id,'Dados da foto salvos.');await loadStats();setTimeout(()=>loadAdminPhotos(adminPage),350)
  }catch(e){cardMessage(id,e.message,true)}
}
async function reOcrPhoto(id){
  cardMessage(id,'Processando OCR...');
  try{const r=await fetch('../backend/api/ocr.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({photo_id:Number(id)})}),d=await r.json();if(!r.ok||!d.ok)throw Error(d.error||'Falha no OCR.');const best=(d.suggested||[])[0]||d.best?.number||'';cardMessage(id,best?`OCR sugeriu ${best}.`:'OCR concluído sem sugestão.',!best);await loadStats();setTimeout(()=>loadAdminPhotos(adminPage),350)}catch(e){cardMessage(id,e.message,true)}
}
async function deletePhoto(id){
  if(!confirm(`Excluir definitivamente a foto #${id}? O arquivo também será removido do servidor.`))return;
  try{const r=await fetch('../backend/api/admin_photos.php',{method:'DELETE',headers:{'Content-Type':'application/json'},body:JSON.stringify({id:Number(id)})}),d=await r.json();if(!r.ok||!d.ok)throw Error(d.error||'Falha ao excluir.');await Promise.all([loadStats(),loadAdminPhotos(adminPage)])}catch(e){cardMessage(id,e.message,true)}
}
function bindAdminPhotoActions(){
  document.querySelectorAll('[data-save-photo]').forEach(b=>b.onclick=()=>savePhotoBibs(b.dataset.savePhoto));
  document.querySelectorAll('[data-reocr-photo]').forEach(b=>b.onclick=()=>reOcrPhoto(b.dataset.reocrPhoto));
  document.querySelectorAll('[data-delete-photo]').forEach(b=>b.onclick=()=>deletePhoto(b.dataset.deletePhoto));
  document.querySelectorAll('[data-admin-pick]').forEach(b=>b.onclick=()=>{const input=document.querySelector(`[data-admin-bibs="${b.dataset.adminPick}"]`),vals=(input.value||'').split(/[,;\s]+/).filter(Boolean);if(!vals.includes(b.dataset.value))vals.push(b.dataset.value);input.value=vals.join(', ')});
}

function syncLibraryEvents(){
  const source=A$('#ocrEvent'),dest=A$('#libraryEvent');if(!source||!dest)return;
  dest.innerHTML='<option value="">Todos os eventos</option>'+[...source.options].filter(o=>o.value).map(o=>`<option value="${o.value}">${adminEsc(o.textContent)}</option>`).join('');
}

A$('#libraryFilter')?.addEventListener('click',()=>loadAdminPhotos(1));
A$('#libraryClear')?.addEventListener('click',()=>{A$('#libraryEvent').value='';A$('#libraryStatus').value='';A$('#libraryBib').value='';if(A$('#libraryColor'))A$('#libraryColor').value='';loadAdminPhotos(1)});
A$('#libraryPrev')?.addEventListener('click',()=>adminPage>1&&loadAdminPhotos(adminPage-1));
A$('#libraryNext')?.addEventListener('click',()=>adminPage<adminPages&&loadAdminPhotos(adminPage+1));
A$('#libraryBib')?.addEventListener('keydown',e=>{if(e.key==='Enter')loadAdminPhotos(1)});

window.addEventListener('load',()=>{loadStats();setTimeout(()=>{syncLibraryEvents();loadAdminPhotos(1)},400)});
window.addEventListener('correfoto:events-loaded',syncLibraryEvents);
window.addEventListener('correfoto:photos-updated',()=>{loadStats();loadAdminPhotos(1)});
