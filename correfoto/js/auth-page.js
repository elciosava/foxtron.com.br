const $=s=>document.querySelector(s);
const msg=(sel,text,error=false)=>{const e=$(sel);e.textContent=text||'';e.className='form-message '+(error?'error':'success')};

function destination(user){
  if(user.role==='admin')return 'admin/';
  if(user.role==='photographer')return 'fotografo/';
  return 'minha-conta.html';
}

$('#regRole').onchange=()=>$('#phoneBox').classList.toggle('hidden',$('#regRole').value!=='photographer');

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
  try{
    const r=await fetch('backend/api/auth.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({
      action:'register',name:$('#regName').value.trim(),email:$('#regEmail').value.trim(),
      password:$('#regPassword').value,role:$('#regRole').value,phone:$('#regPhone').value.trim()
    })}),d=await r.json();
    if(!r.ok||!d.ok)throw Error(d.error||'Falha no cadastro.');
    msg('#registerMessage',d.message||'Conta criada.');
    setTimeout(()=>location.href=destination(d.user),500);
  }catch(err){msg('#registerMessage',err.message,true)}
};
