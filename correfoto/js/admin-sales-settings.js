const S$=s=>document.querySelector(s);
const smoney=n=>Number(n||0).toLocaleString('pt-BR',{style:'currency',currency:'BRL'});

async function loadSalesSettings(){
  try{
    const r=await fetch('../backend/api/admin_sales_settings.php',{cache:'no-store'}),d=await r.json();
    if(!r.ok||!d.ok)throw Error(d.error||'Erro ao carregar configurações.');
    const s=d.settings;
    S$('#settingPhotoPrice').value=Number(s.photo_price).toFixed(2);
    S$('#settingCommission').value=Number(s.default_photographer_commission);
    updateSalesPositioning();
  }catch(e){
    S$('#salesSettingsMessage').textContent=e.message;
    S$('#salesSettingsMessage').className='form-message error';
  }
}

function updateSalesPositioning(){
  const value=Number(S$('#settingPhotoPrice')?.value||14.90);
  const title=S$('#salesPositioningTitle');
  if(title)title.textContent=`Uma foto. Qualidade máxima. ${smoney(value)}.`;
}

S$('#settingPhotoPrice')?.addEventListener('input',updateSalesPositioning);

S$('#salesSettingsForm')?.addEventListener('submit',async e=>{
  e.preventDefault();
  const btn=S$('#saveSalesSettings');
  const message=S$('#salesSettingsMessage');
  btn.disabled=true;
  btn.textContent='Salvando...';
  message.textContent='';

  try{
    const r=await fetch('../backend/api/admin_sales_settings.php',{
      method:'PATCH',
      headers:{'Content-Type':'application/json'},
      body:JSON.stringify({
        photo_price:Number(S$('#settingPhotoPrice').value),
        default_photographer_commission:Number(S$('#settingCommission').value)
      })
    }),d=await r.json();

    if(!r.ok||!d.ok)throw Error(d.error||'Não foi possível salvar.');
    message.textContent='Configurações de venda atualizadas.';
    message.className='form-message success';
    updateSalesPositioning();

    if(typeof loadAdminUsers==='function')loadAdminUsers();
    if(typeof loadPhotographerFinance==='function')loadPhotographerFinance();
  }catch(err){
    message.textContent=err.message;
    message.className='form-message error';
  }finally{
    btn.disabled=false;
    btn.textContent='Salvar configurações';
  }
});

document.addEventListener('DOMContentLoaded',()=>setTimeout(loadSalesSettings,450));
