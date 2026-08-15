const H$=s=>document.querySelector(s);
const hesc=(v='')=>String(v).replace(/[&<>'"]/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#39;','"':'&quot;'}[c]));
const hdate=v=>{
  if(!v)return '';
  const [y,m,d]=String(v).split('-').map(Number);
  return new Date(y,m-1,d).toLocaleDateString('pt-BR',{day:'2-digit',month:'short',year:'numeric'});
};
const dateOnly=v=>{
  if(!v)return null;
  const [y,m,d]=String(v).split('-').map(Number);
  return new Date(y,m-1,d);
};
const todayStart=()=>{
  const d=new Date(); d.setHours(0,0,0,0); return d;
};
function coverUrl(e){
  const p=String(e.cover_path||'').replace(/^\/+/,'');
  return p || 'images/drone-race-hero.jpg';
}
function eventCard(e,upcoming=false){
  const count=Number(e.photo_count||0);
  const status=upcoming
    ? (count?`${count} foto(s) já publicadas`:'Fotos em breve')
    : (count?`${count} foto(s)`:'Galeria em preparação');
  return `<article class="event-card">
    <a class="event-card-media" href="fotos.html?event_id=${e.id}">
      <img src="${hesc(coverUrl(e))}" alt="${hesc(e.name)}" loading="lazy">
      <span class="event-card-date">${hesc(hdate(e.event_date))}</span>
      ${upcoming&&!count?'<span class="event-card-badge">EM BREVE</span>':''}
    </a>
    <div class="event-card-body">
      <div>
        <small>${hesc(e.location||'Local a confirmar')}</small>
        <h3>${hesc(e.name)}</h3>
      </div>
      <div class="event-card-footer">
        <span>${hesc(status)}</span>
        <a href="fotos.html?event_id=${e.id}">${count?'Ver fotos':'Abrir evento'} →</a>
      </div>
    </div>
  </article>`;
}
async function loadHomeEvents(){
  try{
    const r=await fetch('backend/api/public_events.php',{cache:'no-store'}),d=await r.json();
    if(!r.ok||!d.ok)throw Error(d.error||'Não foi possível carregar os eventos.');
    const events=d.events||[],today=todayStart();

    const upcoming=events
      .filter(e=>dateOnly(e.event_date)>=today)
      .sort((a,b)=>dateOnly(a.event_date)-dateOnly(b.event_date))
      .slice(0,6);

    const recent=events
      .filter(e=>dateOnly(e.event_date)<today || Number(e.photo_count||0)>0)
      .sort((a,b)=>dateOnly(b.event_date)-dateOnly(a.event_date))
      .slice(0,9);

    H$('#upcomingEvents').innerHTML=upcoming.length
      ? upcoming.map(e=>eventCard(e,true)).join('')
      : '<div class="empty event-empty-wide"><b>Nenhum próximo evento cadastrado.</b><span>Novas corridas aparecerão aqui assim que entrarem na agenda.</span></div>';

    H$('#recentEvents').innerHTML=recent.length
      ? recent.map(e=>eventCard(e,false)).join('')
      : '<div class="empty event-empty-wide"><b>Nenhum evento com fotos ainda.</b><span>As primeiras galerias aparecerão aqui.</span></div>';
  }catch(e){
    const html=`<div class="empty event-empty-wide"><b>Não foi possível carregar os eventos.</b><span>${hesc(e.message)}</span></div>`;
    H$('#upcomingEvents').innerHTML=html;H$('#recentEvents').innerHTML=html;
  }
}
H$('#menuBtn')?.addEventListener('click',()=>document.querySelector('.nav nav')?.classList.toggle('mobile-open'));
loadHomeEvents();
