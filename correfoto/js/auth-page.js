const $=s=>document.querySelector(s);
const msg=(sel,text,error=false)=>{const e=$(sel);e.textContent=text||'';e.className='form-message '+(error?'error':'success')};
const PHOTOGRAPHER_TERMS_VERSION='2026-08-14-v1';

function destination(user){
  if(user.role==='admin')return 'admin/';
  if(user.role==='photographer')return 'fotografo/';
  return 'minha-conta.html';
}

function updateRegistrationRole(){
  const photographer=$('#regRole').value==='photographer';
  $('#phoneBox').classList.toggle('hidden',!photographer);
  $('#photographerTermsBox').classList.toggle('hidden',!photographer);

  if(!photographer){
    $('#regPhotographerTerms').checked=false;
    $('#regPhotographerTerms').required=false;
  }else{
    $('#regPhotographerTerms').required=true;
  }
}

$('#regRole').onchange=updateRegistrationRole;
updateRegistrationRole();

$('#loginForm').onsubmit=async e=>{
  e.preventDefault();msg('#loginMessage','');
  try{
    const r=await fetch('backend/api/auth.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({
      action:'login',email:$('#loginEmail').value.trim(),password:$('#loginPassword').value
    })}),d=await r.json();
    if(!r.ok||!d.ok)throw Error(d.error||'Falha no login.');
    location.href=destination(d.user);
  }catch(err){msg('#loginMessage',err.message,true)}
};

$('#registerForm').onsubmit=async e=>{
  e.preventDefault();msg('#registerMessage','');

  const role=$('#regRole').value;
  const photographer=role==='photographer';

  if(photographer&&!$('#regPhotographerTerms').checked){
    msg('#registerMessage','Para se cadastrar como fotógrafo, leia e aceite os Termos do Fotógrafo.',true);
    return;
  }

  try{
    const r=await fetch('backend/api/auth.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({
      action:'register',
      name:$('#regName').value.trim(),
      email:$('#regEmail').value.trim(),
      password:$('#regPassword').value,
      role,
      phone:$('#regPhone').value.trim(),
      photographer_terms_accepted:photographer?$('#regPhotographerTerms').checked:false,
      photographer_terms_version:photographer?PHOTOGRAPHER_TERMS_VERSION:null
    })}),d=await r.json();

    if(!r.ok||!d.ok)throw Error(d.error||'Falha no cadastro.');
    msg('#registerMessage',d.message||'Conta criada.');
    setTimeout(()=>location.href=destination(d.user),500);
  }catch(err){msg('#registerMessage',err.message,true)}
};
