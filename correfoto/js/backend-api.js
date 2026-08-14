const BackendAPI = {
  async events() {
    const r=await fetch('backend/api/events.php'); return r.json();
  },
  async search(bib,eventId='') {
    const q=new URLSearchParams({bib});
    if(eventId) q.set('event_id',eventId);
    const r=await fetch('backend/api/search.php?'+q); return r.json();
  },
  async photos(eventId='',bib='') {
    const q=new URLSearchParams();
    if(eventId) q.set('event_id',eventId);
    if(bib) q.set('bib',bib);
    const r=await fetch('backend/api/photos.php?'+q); return r.json();
  },
  async upload(file,eventId,bib='') {
    const fd=new FormData();
    fd.append('photo',file); fd.append('event_id',eventId); fd.append('bib_number',bib);
    const r=await fetch('backend/api/photos.php',{method:'POST',body:fd}); return r.json();
  },
  async order(customerName,customerEmail,items) {
    const r=await fetch('backend/api/orders.php',{
      method:'POST',headers:{'Content-Type':'application/json'},
      body:JSON.stringify({customer_name:customerName,customer_email:customerEmail,items})
    }); return r.json();
  }
};
