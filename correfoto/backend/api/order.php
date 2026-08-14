<?php
require_once __DIR__.'/../config/bootstrap.php';

if($_SERVER['REQUEST_METHOD']!=='GET') json_error('Método não permitido.',405);
$token=trim((string)($_GET['token']??''));
if(!preg_match('/^[a-f0-9]{64}$/',$token)) json_error('Pedido inválido.',422);

$s=$pdo->prepare("SELECT id,customer_name,total,status,created_at,paid_at,payment_id,mp_preference_id,mp_checkout_url,mp_status,mp_status_detail FROM orders WHERE public_token=? LIMIT 1");
$s->execute([$token]);
$order=$s->fetch();
if(!$order) json_error('Pedido não encontrado.',404);

$q=$pdo->prepare("SELECT oi.photo_id,oi.unit_price,p.public_path,e.name event_name,
 (SELECT GROUP_CONCAT(pb.bib_number ORDER BY pb.bib_number SEPARATOR ',') FROM photo_bibs pb WHERE pb.photo_id=p.id AND pb.confirmed=1) bib_numbers,
 od.token download_token,od.expires_at,od.download_count,od.max_downloads
 FROM order_items oi
 JOIN photos p ON p.id=oi.photo_id
 JOIN events e ON e.id=p.event_id
 LEFT JOIN order_downloads od ON od.order_id=oi.order_id AND od.photo_id=oi.photo_id
 WHERE oi.order_id=? ORDER BY oi.id");
$q->execute([$order['id']]);
$items=$q->fetchAll();

foreach($items as &$item){
    $item['download_url']=null;
    if($order['status']==='paid' && !empty($item['download_token'])){
        $item['download_url']='backend/download.php?token='.$item['download_token'];
    }
    unset($item['download_token']);
}
unset($item);

json_ok(['order'=>$order,'items'=>$items]);
