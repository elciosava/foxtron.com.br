# Backend real - PHP + MySQL

1. Coloque o projeto em `C:/xampp/htdocs/drone-fotos-html`.
2. Ligue Apache e MySQL no XAMPP.
3. Importe `backend/sql/schema.sql` no phpMyAdmin.
4. O banco padrão é `drone_fotos`, usuário `root`, senha vazia.
5. As APIs usam PDO com prepared statements.
6. A pasta `backend/uploads` recebe as fotos enviadas.

Endpoints:
- GET/POST `backend/api/events.php`
- GET/POST `backend/api/photos.php`
- GET `backend/api/search.php?bib=123`
- POST `backend/api/orders.php`
- GET/POST/DELETE `backend/api/auth.php`
- GET `backend/api/admin_stats.php`

Pagamento:
A estrutura de pedidos está pronta para conectar ao Mercado Pago Checkout Pro. Não coloque Access Token no JavaScript; ele deve ficar somente no PHP/variável de ambiente. O pagamento deve mudar o pedido para `paid` somente após confirmação por webhook.
