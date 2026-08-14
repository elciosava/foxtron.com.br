(async()=>{
  try{
    const r=await fetch('backend/api/auth.php',{cache:'no-store'}),d=await r.json();
    const link=document.querySelector('#accountLink');
    if(!link)return;
    if(!d.user){link.textContent='Entrar';link.href='entrar.html';return}
    link.textContent=d.user.name.split(' ')[0];
    link.href=d.user.role==='admin'?'admin/':d.user.role==='photographer'?'fotografo/':'minha-conta.html';

    // Preenche checkout para cliente autenticado, sem alterar o fluxo de visitante.
    if(d.user.role==='customer'){
      const name=document.querySelector('#checkoutName'),email=document.querySelector('#checkoutEmail');
      if(name&&!name.value)name.value=d.user.name;
      if(email&&!email.value)email.value=d.user.email;
    }
  }catch(e){}
})();
