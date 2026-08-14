<?php
function correfoto_mark_paid(PDO $pdo, int $orderId, ?string $paymentId=null, ?string $mpStatus='approved'): void {
    $pdo->prepare("UPDATE orders SET status='paid',paid_at=COALESCE(paid_at,NOW()),payment_id=COALESCE(?,payment_id),mp_status=COALESCE(?,mp_status) WHERE id=?")
        ->execute([$paymentId,$mpStatus,$orderId]);
    $items=$pdo->prepare("SELECT photo_id FROM order_items WHERE order_id=?");$items->execute([$orderId]);
    $ins=$pdo->prepare("INSERT INTO order_downloads(order_id,photo_id,token,expires_at,max_downloads)
        VALUES(?,?,?,DATE_ADD(NOW(),INTERVAL 7 DAY),10)
        ON DUPLICATE KEY UPDATE expires_at=GREATEST(expires_at,DATE_ADD(NOW(),INTERVAL 7 DAY))");
    foreach($items->fetchAll() as $item){
        $ins->execute([$orderId,(int)$item['photo_id'],bin2hex(random_bytes(32))]);
    }
}

function correfoto_apply_mp_payment(PDO $pdo, array $payment): array {
    $external=(string)($payment['external_reference']??'');
    $paymentId=(string)($payment['id']??'');
    $status=(string)($payment['status']??'');
    if(!ctype_digit($external)) throw new RuntimeException('Pagamento sem external_reference válido.');
    $orderId=(int)$external;

    $s=$pdo->prepare("SELECT id,total,status FROM orders WHERE id=? FOR UPDATE");
    $s->execute([$orderId]);$order=$s->fetch();
    if(!$order) throw new RuntimeException('Pedido não encontrado para o pagamento.');

    $amount=(float)($payment['transaction_amount']??0);
    if(abs($amount-(float)$order['total'])>0.01) throw new RuntimeException('Valor do pagamento não corresponde ao pedido.');

    $pdo->prepare("UPDATE orders SET payment_id=?,mp_status=?,mp_status_detail=? WHERE id=?")
        ->execute([$paymentId,$status,(string)($payment['status_detail']??''),$orderId]);

    if($status==='approved'){
        correfoto_mark_paid($pdo,$orderId,$paymentId,$status);
    }elseif(in_array($status,['rejected','cancelled','refunded','charged_back'],true)){
        // Não transforma automaticamente em cancelled para não apagar histórico/download já emitido.
        if($order['status']!=='paid') $pdo->prepare("UPDATE orders SET status='pending' WHERE id=?")->execute([$orderId]);
    }
    return ['order_id'=>$orderId,'payment_id'=>$paymentId,'mp_status'=>$status];
}
