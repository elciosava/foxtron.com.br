const API_BASE='backend/api';
const api={
 async events(){return (await fetch(`${API_BASE}/events.php`)).json()},
 async photos(params={}){const q=new URLSearchParams(params);return (await fetch(`${API_BASE}/photos.php?${q}`)).json()},
 async uploadPhoto(file,eventId,bibNumber=''){const f=new FormData();f.append('photo',file);f.append('event_id',eventId);f.append('bib_number',bibNumber);return (await fetch(`${API_BASE}/photos.php`,{method:'POST',body:f})).json()},
 async createOrder(customer_name,customer_email,items){return (await fetch(`${API_BASE}/orders.php`,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({customer_name,customer_email,items})})).json()}
};
