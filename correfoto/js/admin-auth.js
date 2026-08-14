(async()=>{
  try{
    const r=await fetch('../backend/api/auth.php',{cache:'no-store'}),d=await r.json();
    if(!d.user||d.user.role!=='admin'||d.user.status!=='active'){
      location.replace('../entrar.html');return;
    }
  }catch(e){location.replace('../entrar.html')}
})();
document.addEventListener('DOMContentLoaded',()=>{
  const b=document.querySelector('#adminLogout');
  if(b)b.onclick=async()=>{await fetch('../backend/api/auth.php',{method:'DELETE'});location.href='../'};
});
