<?php
require_once __DIR__.'/../config/bootstrap.php';
require_once __DIR__.'/../lib/mercadopago.php';
if($_SERVER['REQUEST_METHOD']!=='POST') json_error('Método não permitido.',405);
$d=body();$token=trim((string)($d['order_token']??''));
if(!preg_match('/^[a-f0-9]{64}$/',$token)) json_error('Pedido inválido.',422);
if(!mp_is_configured()) json_error('Mercado Pago ainda não está configurado no servidor.',503);
global $MP_PUBLIC_KEY;
$s=$pdo->prepare("SELECT id,customer_name,customer_email,total,status,public_token,mp_preference_id,mp_checkout_url FROM orders WHERE public_token=? LIMIT 1");
$s->execute([$token]);$order=$s->fetch();if(!$order)json_error('Pedido não encontrado.',404);
if($order['status']==='paid')json_ok(['paid'=>true,'order_url'=>'pedido.html?token='.$token]);
if(!empty($order['mp_preference_id']))json_ok(['preference_id'=>(string)$order['mp_preference_id'],'public_key'=>$MP_PUBLIC_KEY]);
$q=$pdo->prepare("SELECT oi.photo_id,oi.unit_price,e.name event_name, (SELECT GROUP_CONCAT(pb.bib_number ORDER BY pb.bib_number SEPARATOR ',') FROM photo_bibs pb WHERE pb.photo_id=p.id AND pb.confirmed=1) bib_numbers FROM order_items oi JOIN photos p ON p.id=oi.photo_id JOIN events e ON e.id=p.event_id WHERE oi.order_id=?");
$q->execute([$order['id']]);$items=$q->fetchAll();if(!$items)json_error('Pedido sem fotos.',422);
try{$created=mp_create_preference($order,$items);$pref=$created['preference'];$pdo->prepare("UPDATE orders SET mp_preference_id=?,mp_checkout_url=? WHERE id=?")->execute([(string)$pref['id'],$created['checkout_url'],$order['id']]);json_ok(['preference_id'=>(string)$pref['id'],'public_key'=>$MP_PUBLIC_KEY]);}catch(Throwable $e){json_error('Não foi possível iniciar o pagamento: '.$e->getMessage(),502);}
