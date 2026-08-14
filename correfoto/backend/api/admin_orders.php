<?php
require_once __DIR__.'/../config/bootstrap.php';
require_admin();
require_once __DIR__.'/../lib/order_payment.php';

if($_SERVER['REQUEST_METHOD']==='GET'){
    $s=$pdo->query("SELECT o.id,o.customer_name,o.customer_email,o.total,o.status,o.created_at,o.paid_at,o.payment_id,o.mp_preference_id,o.mp_status,o.mp_status_detail,
      COUNT(oi.id) item_count
      FROM orders o LEFT JOIN order_items oi ON oi.order_id=o.id
      GROUP BY o.id ORDER BY o.id DESC LIMIT 100");
    json_ok(['orders'=>$s->fetchAll()]);
}

if($_SERVER['REQUEST_METHOD']==='PATCH'){
    $d=body(); $id=(int)($d['id']??0); $status=(string)($d['status']??'');
    if(!$id || !in_array($status,['pending','paid','cancelled'],true)) json_error('Dados inválidos.',422);

    $pdo->beginTransaction();
    try{
        $q=$pdo->prepare("SELECT id,status FROM orders WHERE id=? FOR UPDATE");$q->execute([$id]);$order=$q->fetch();
        if(!$order) throw new RuntimeException('Pedido não encontrado.');

        if($status==='paid'){
            correfoto_mark_paid($pdo,$id,null,'manual');
        }else{
            $paidAt=$status==='pending'?null:($order['status']==='paid'?null:null);
            $pdo->prepare("UPDATE orders SET status=?,paid_at=IF(?='paid',paid_at,NULL) WHERE id=?")->execute([$status,$status,$id]);
            if($status!=='paid') $pdo->prepare("DELETE FROM order_downloads WHERE order_id=?")->execute([$id]);
        }
        $pdo->commit();
        json_ok(['id'=>$id,'status'=>$status]);
    }catch(Throwable $e){
        if($pdo->inTransaction())$pdo->rollBack();
        json_error('Não foi possível atualizar o pedido: '.$e->getMessage(),500);
    }
}
json_error('Método não permitido.',405);
