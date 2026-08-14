let items = [];
let eventsCache = [];
const $ = s => document.querySelector(s);
const files = $('#ocrFiles'), eventSelect = $('#ocrEvent'), runButton = $('#runOcr');
const indexButton = $('#indexOcr'), clearButton = $('#clearOcr'), eventForm = $('#eventForm');
const esc=(v='')=>String(v).replace(/[&<>'"]/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#39;','"':'&quot;'}[c]));
const formatDate=v=>{if(!v)return'';const[y,m,d]=v.split('-');return y&&m&&d?`${d}/${m}/${y}`:v};
function msg(message,error=false){const el=$('#uploadMessage');el.textContent=message||'';el.className='form-message '+(error?'error':'success')}
function eventMsg(message,error=false){const el=$('#eventMessage');el.textContent=message||'';el.className='form-message '+(error?'error':'success')}

async function loadEvents(selectId=null){
  try{const r=await fetch('../backend/api/events.php',{cache:'no-store'}),data=await r.json();if(!r.ok||!data.ok)throw Error(data.error||'Falha ao carregar eventos.');
    eventsCache=data.events||[];eventSelect.innerHTML=eventsCache.length?'<option value="">Selecione um evento</option>'+eventsCache.map(e=>`<option value="${e.id}">${esc(e.name)}${e.event_date?' · '+formatDate(e.event_date):''}</option>`).join(''):'<option value="">Nenhum evento cadastrado</option>';
    if(selectId)eventSelect.value=String(selectId);runButton.disabled=!eventsCache.length;window.dispatchEvent(new CustomEvent('correfoto:events-loaded'));
    $('#eventList').innerHTML=eventsCache.length?eventsCache.slice(0,6).map(e=>`<div class="event-mini"><b>${esc(e.name)}</b><small>${formatDate(e.event_date)}${e.location?' · '+esc(e.location):''}</small></div>`).join(''):'<div class="event-empty">Cadastre seu primeiro evento acima.</div>';
  }catch(e){eventSelect.innerHTML='<option value="">Erro ao carregar eventos</option>';msg(e.message,true)}
}

eventForm.addEventListener('submit',async e=>{e.preventDefault();const btn=$('#saveEvent'),payload={name:$('#eventName').value.trim(),event_date:$('#eventDate').value,location:$('#eventLocation').value.trim()};if(!payload.name||!payload.event_date)return eventMsg('Informe nome e data.',true);btn.disabled=true;btn.textContent='Cadastrando...';try{const r=await fetch('../backend/api/events.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(payload)}),d=await r.json();if(!r.ok||!d.ok)throw Error(d.error||'Erro ao cadastrar.');eventForm.reset();eventMsg('Evento cadastrado.');await loadEvents(d.id)}catch(err){eventMsg(err.message,true)}finally{btn.disabled=false;btn.textContent='＋ Cadastrar evento'}});

function gerarId(){
  if(window.crypto&&typeof window.crypto.randomUUID==='function')return window.crypto.randomUUID();
  return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g,c=>{const r=Math.random()*16|0,v=c==='x'?r:(r&0x3|0x8);return v.toString(16)});
}

files.onchange=()=>{[...files.files].filter(f=>['image/jpeg','image/png','image/webp'].includes(f.type)).forEach(f=>items.push({localId:gerarId(),file:f,photoId:null,path:'',name:f.name,size:(f.size/1024/1024).toFixed(1)+' MB',numbers:'',candidates:[],status:'aguardando',progress:0,error:''}));files.value='';render()};
function statusText(i){if(i.status==='enviando')return`enviando ${i.progress}%`;if(i.status==='ocr')return'procurando números...';if(i.status==='erro')return`erro: ${i.error}`;if(i.status==='revisar')return i.candidates.length?`OCR encontrou ${i.candidates.length} candidato(s)`:'OCR não encontrou número';if(i.status==='indexado')return`indexado · ID ${i.photoId}`;if(i.status==='enviado')return`enviado · ID ${i.photoId}`;return i.status}
function badges(i){return i.candidates.map(c=>`<button class="ocr-badge" type="button" data-pick="${i.localId}" data-value="${esc(c.number)}" title="Confiança ${c.confidence}%">${esc(c.number)} <small>${Math.round(c.confidence)}%</small></button>`).join('')}
function render(){
  $('#queueCount').textContent=String(items.length).padStart(2,'0')+' imagens';
  $('#ocrList').innerHTML=items.length?items.map(i=>`<div class="ocr-row ocr-row-rich"><div class="ocr-thumb">${i.path?`<img src="../${esc(i.path)}" alt="">`:'▧'}</div><div class="file"><div><strong>${esc(i.name)}</strong><small>${esc(i.size)} · ${esc(statusText(i))}</small>${i.status==='enviando'?`<div class="mini-progress"><i style="width:${i.progress}%"></i></div>`:''}<div class="ocr-badges">${badges(i)}</div></div></div><div class="ocr-edit"><label>Números encontrados/revisados<input value="${esc(i.numbers)}" data-num="${i.localId}" placeholder="1847, 352"></label><button data-del="${i.localId}" ${['enviando','ocr'].includes(i.status)?'disabled':''}>×</button></div></div>`).join(''):'<div class="empty"><b>A fila está vazia.</b><span>Adicione imagens para começar.</span></div>';
  document.querySelectorAll('[data-num]').forEach(e=>e.oninput=()=>{const x=items.find(i=>i.localId===e.dataset.num);x.numbers=e.value.replace(/[^0-9,; ]/g,'')});
  document.querySelectorAll('[data-pick]').forEach(b=>b.onclick=()=>{const x=items.find(i=>i.localId===b.dataset.pick);const values=x.numbers.split(/[,;\s]+/).filter(Boolean);if(!values.includes(b.dataset.value))values.push(b.dataset.value);x.numbers=values.join(', ');render()});
  document.querySelectorAll('[data-del]').forEach(b=>b.onclick=()=>{items=items.filter(i=>i.localId!==b.dataset.del);render()});
  indexButton.disabled=!items.some(i=>i.photoId&&i.numbers.trim());
}
function uploadOne(item,eventId){return new Promise(resolve=>{const xhr=new XMLHttpRequest(),fd=new FormData();fd.append('photo',item.file);fd.append('event_id',eventId);xhr.open('POST','../backend/api/photos.php');xhr.upload.onprogress=e=>{if(e.lengthComputable){item.progress=Math.round(e.loaded/e.total*100);render()}};xhr.onload=()=>{let d={};try{d=JSON.parse(xhr.responseText)}catch{};if(xhr.status>=200&&xhr.status<300&&d.ok){item.photoId=d.id;item.path=d.path;item.status='enviado';item.progress=100}else{item.status='erro';item.error=d.error||`HTTP ${xhr.status}`}render();resolve(Boolean(item.photoId))};xhr.onerror=()=>{item.status='erro';item.error='Falha de rede.';render();resolve(false)};item.status='enviando';render();xhr.send(fd)})}
async function runOcr(item){
  item.status = 'ocr';
  render();

  try{
    const response = await fetch('../backend/api/ocr.php', {
      method: 'POST',
      headers: {'Content-Type':'application/json'},
      body: JSON.stringify({photo_id: item.photoId})
    });

    const raw = await response.text();

    let data;
    try{
      data = JSON.parse(raw);
    }catch(e){
      throw new Error('Resposta inválida do OCR: ' + raw.slice(0,200));
    }

    if(!response.ok || !data.ok){
      throw new Error(data.error || 'Falha ao executar OCR.');
    }

    const candidates = Array.isArray(data.candidates) ? data.candidates : [];
    const suggested = Array.isArray(data.suggested) ? data.suggested.map(String).filter(Boolean) : [];

    item.candidates = candidates;

    // Regra principal:
    // se o backend devolveu suggested, usa o PRIMEIRO como valor do campo.
    let bestNumber = suggested.length ? suggested[0] : '';

    // fallback para o candidato com maior confiança
    if(!bestNumber && candidates.length){
      const best = [...candidates].sort(
        (a,b) => Number(b.confidence || 0) - Number(a.confidence || 0)
      )[0];
      if(best && best.number != null){
        bestNumber = String(best.number);
      }
    }

    item.numbers = bestNumber;
    item.status = 'revisar';
    item.error = '';

    render();

    // Força o valor no input já renderizado.
    // Isso cobre casos em que o HTML do item não estava usando item.numbers corretamente.
    const input =
      document.querySelector(`[data-photo-id="${item.photoId}"] input[data-role="bib-input"]`) ||
      document.querySelector(`input[data-photo-id="${item.photoId}"]`) ||
      document.querySelector(`#bib-${item.photoId}`);

    if(input && bestNumber){
      input.value = bestNumber;
      input.dispatchEvent(new Event('input', {bubbles:true}));
      input.dispatchEvent(new Event('change', {bubbles:true}));
    }

    if(bestNumber){
      msg(`OCR identificou ${bestNumber}. Revise e clique em Indexar revisados.`);
    }else{
      msg('OCR executou, mas não encontrou um número confiável. Você pode preencher manualmente.', true);
    }

  }catch(e){
    item.status = 'revisar';
    item.error = e.message;
    render();
    msg(`OCR falhou no painel: ${e.message}`, true);
  }
}
runButton.onclick=async()=>{const eventId=eventSelect.value;if(!eventId)return msg('Selecione ou cadastre um evento.',true);const pending=items.filter(i=>!i.photoId);if(!pending.length)return msg('Não há novas fotos para enviar.');runButton.disabled=true;files.disabled=true;let done=0,ok=0;for(const item of pending){const uploaded=await uploadOne(item,eventId);if(uploaded){ok++;await runOcr(item)}done++;$('#progressBar').style.width=Math.round(done/pending.length*100)+'%'}runButton.disabled=false;files.disabled=false;msg(`${ok} foto(s) enviada(s). Revise os números sugeridos pelo OCR e clique em Indexar revisados.`,false)};
clearButton.onclick=()=>{if(items.some(i=>['enviando','ocr'].includes(i.status)))return;items=[];$('#progressBar').style.width='0';render();msg('Fila limpa.')};
indexButton.onclick=async()=>{const reviewed=items.filter(i=>i.photoId&&i.numbers.trim());if(!reviewed.length)return msg('Informe pelo menos um número.',true);indexButton.disabled=true;let ok=0,fail=0;for(const item of reviewed){try{const nums=[...new Set(item.numbers.split(/[,;\s]+/).map(x=>x.replace(/\D/g,'')).filter(Boolean))];const r=await fetch('../backend/api/photos.php',{method:'PATCH',headers:{'Content-Type':'application/json'},body:JSON.stringify({id:item.photoId,bib_numbers:nums})}),d=await r.json();if(!r.ok||!d.ok)throw Error(d.error||'Erro ao indexar.');item.status='indexado';ok++}catch(e){item.status='erro';item.error=e.message;fail++}render()}indexButton.disabled=false;msg(`${ok} foto(s) indexada(s)${fail?` · ${fail} falha(s)`:''}.`,!!fail);window.dispatchEvent(new CustomEvent('correfoto:photos-updated'))};
loadEvents();render();
