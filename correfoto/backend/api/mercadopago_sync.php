<?php
require_once __DIR__.'/../config/bootstrap.php';
require_once __DIR__.'/../lib/mercadopago.php';
require_once __DIR__.'/../lib/order_payment.php';
if($_SERVER['REQUEST_METHOD']!=='POST') json_error('Método não permitido.',405);
$d=body();$token=trim((string)($d['order_token']??''));$paymentId=preg_replace('/\D/','',(string)($d['payment_id']??''));
if(!preg_match('/^[a-f0-9]{64}$/',$token)||$paymentId==='')json_error('Dados inválidos.',422);
$s=$pdo->prepare("SELECT id,status FROM orders WHERE public_token=? LIMIT 1");$s->execute([$token]);$order=$s->fetch();if(!$order)json_error('Pedido não encontrado.',404);
try{
    $payment=mp_get_payment($paymentId);
    if((string)($payment['external_reference']??'')!==(string)$order['id'])json_error('Pagamento não pertence a este pedido.',403);
    $pdo->beginTransaction();$result=correfoto_apply_mp_payment($pdo,$payment);$pdo->commit();
    json_ok(['status'=>$payment['status']??null,'order_status'=>($payment['status']??'')==='approved'?'paid':'pending','payment_id'=>$paymentId]);
}catch(Throwable $e){if($pdo->inTransaction())$pdo->rollBack();json_error('Não foi possível conferir o pagamento: '.$e->getMessage(),502);}
