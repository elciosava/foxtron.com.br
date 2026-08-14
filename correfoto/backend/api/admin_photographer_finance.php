<?php
require_once __DIR__.'/../config/bootstrap.php';
require_admin();

function finance_photographers(PDO $pdo): array {
    $sql = "
      SELECT
        u.id,
        u.name,
        u.email,
        u.status,
        pp.phone,
        pp.pix_key,
        pp.commission_percent current_commission_percent,

        COALESCE((
          SELECT SUM(oi.unit_price * oi.quantity)
          FROM order_items oi
          JOIN orders o ON o.id=oi.order_id AND o.status='paid'
          WHERE oi.photographer_id=u.id
        ),0) gross_sales,

        COALESCE((
          SELECT SUM(
            oi.unit_price * oi.quantity *
            COALESCE(oi.photographer_commission_percent,pp.commission_percent,60) / 100
          )
          FROM order_items oi
          JOIN orders o ON o.id=oi.order_id AND o.status='paid'
          WHERE oi.photographer_id=u.id
        ),0) earned_commission,

        COALESCE((
          SELECT SUM(po.amount)
          FROM photographer_payouts po
          WHERE po.photographer_id=u.id AND po.status='paid'
        ),0) paid_out,

        COALESCE((
          SELECT COUNT(*)
          FROM order_items oi
          JOIN orders o ON o.id=oi.order_id AND o.status='paid'
          WHERE oi.photographer_id=u.id
        ),0) sold_items,

        COALESCE((
          SELECT COUNT(*)
          FROM photos p
          WHERE p.photographer_id=u.id
        ),0) photo_count,

        COALESCE((
          SELECT COUNT(*)
          FROM photographer_payouts po
          WHERE po.photographer_id=u.id AND po.status='paid'
        ),0) payout_count

      FROM users u
      LEFT JOIN photographer_profiles pp ON pp.user_id=u.id
      WHERE u.role='photographer'
      ORDER BY u.name
    ";

    $rows=$pdo->query($sql)->fetchAll();

    foreach($rows as &$r){
        $earned=(float)$r['earned_commission'];
        $paid=(float)$r['paid_out'];
        $r['gross_sales']=round((float)$r['gross_sales'],2);
        $r['earned_commission']=round($earned,2);
        $r['paid_out']=round($paid,2);
        $r['balance_due']=round(max(0,$earned-$paid),2);
        $r['current_commission_percent']=(float)($r['current_commission_percent']??60);
        $r['sold_items']=(int)$r['sold_items'];
        $r['photo_count']=(int)$r['photo_count'];
        $r['payout_count']=(int)$r['payout_count'];
    }
    unset($r);
    return $rows;
}

if($_SERVER['REQUEST_METHOD']==='GET'){
    $photographerId=(int)($_GET['photographer_id']??0);

    if(!$photographerId){
        json_ok(['photographers'=>finance_photographers($pdo)]);
    }

    $u=$pdo->prepare("
      SELECT u.id,u.name,u.email,u.status,pp.phone,pp.pix_key,pp.commission_percent
      FROM users u
      LEFT JOIN photographer_profiles pp ON pp.user_id=u.id
      WHERE u.id=? AND u.role='photographer'
      LIMIT 1
    ");
    $u->execute([$photographerId]);
    $photographer=$u->fetch();
    if(!$photographer) json_error('Fotógrafo não encontrado.',404);

    $sales=$pdo->prepare("
      SELECT
        oi.id order_item_id,
        oi.order_id,
        oi.photo_id,
        oi.unit_price,
        oi.quantity,
        COALESCE(oi.photographer_commission_percent,pp.commission_percent,60) commission_percent,
        ROUND(
          oi.unit_price * oi.quantity *
          COALESCE(oi.photographer_commission_percent,pp.commission_percent,60) / 100,
          2
        ) commission_amount,
        o.paid_at,
        o.customer_name,
        e.name event_name,
        CASE WHEN ppi.id IS NULL THEN 0 ELSE 1 END paid_to_photographer,
        ppi.payout_id
      FROM order_items oi
      JOIN orders o ON o.id=oi.order_id AND o.status='paid'
      JOIN photos p ON p.id=oi.photo_id
      JOIN events e ON e.id=p.event_id
      LEFT JOIN photographer_profiles pp ON pp.user_id=oi.photographer_id
      LEFT JOIN photographer_payout_items ppi ON ppi.order_item_id=oi.id
      WHERE oi.photographer_id=?
      ORDER BY o.paid_at DESC,o.id DESC,oi.id DESC
      LIMIT 300
    ");
    $sales->execute([$photographerId]);

    $payouts=$pdo->prepare("
      SELECT id,gross_amount,amount,item_count,status,pix_key_snapshot,notes,paid_at,created_at
      FROM photographer_payouts
      WHERE photographer_id=?
      ORDER BY id DESC
      LIMIT 100
    ");
    $payouts->execute([$photographerId]);

    $all=finance_photographers($pdo);
    $summary=null;
    foreach($all as $row){
        if((int)$row['id']===$photographerId){$summary=$row;break;}
    }

    json_ok([
        'photographer'=>$photographer,
        'summary'=>$summary,
        'sales'=>$sales->fetchAll(),
        'payouts'=>$payouts->fetchAll(),
    ]);
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $d=body();
    $photographerId=(int)($d['photographer_id']??0);
    $notes=trim((string)($d['notes']??''));
    if(!$photographerId) json_error('Fotógrafo inválido.',422);

    $pdo->beginTransaction();
    try{
        $p=$pdo->prepare("
          SELECT u.id,u.name,pp.pix_key,pp.commission_percent
          FROM users u
          LEFT JOIN photographer_profiles pp ON pp.user_id=u.id
          WHERE u.id=? AND u.role='photographer'
          FOR UPDATE
        ");
        $p->execute([$photographerId]);
        $photographer=$p->fetch();
        if(!$photographer) throw new RuntimeException('Fotógrafo não encontrado.');

        // Seleciona SOMENTE itens de pedidos pagos ainda não repassados.
        $items=$pdo->prepare("
          SELECT
            oi.id order_item_id,
            oi.unit_price,
            oi.quantity,
            COALESCE(oi.photographer_commission_percent,pp.commission_percent,60) commission_percent
          FROM order_items oi
          JOIN orders o ON o.id=oi.order_id AND o.status='paid'
          LEFT JOIN photographer_profiles pp ON pp.user_id=oi.photographer_id
          LEFT JOIN photographer_payout_items ppi ON ppi.order_item_id=oi.id
          WHERE oi.photographer_id=?
            AND ppi.id IS NULL
          ORDER BY oi.id
          FOR UPDATE
        ");
        $items->execute([$photographerId]);
        $rows=$items->fetchAll();
        if(!$rows) throw new RuntimeException('Não existe saldo pendente para este fotógrafo.');

        $gross=0.0;
        $amount=0.0;
        foreach($rows as &$row){
            $itemGross=(float)$row['unit_price']*(int)$row['quantity'];
            $percent=(float)$row['commission_percent'];
            $commission=round($itemGross*$percent/100,2);
            $row['_gross']=$itemGross;
            $row['_commission']=$commission;
            $gross+=$itemGross;
            $amount+=$commission;
        }
        unset($row);

        $gross=round($gross,2);
        $amount=round($amount,2);

        $ins=$pdo->prepare("
          INSERT INTO photographer_payouts(
            photographer_id,gross_amount,amount,item_count,status,
            pix_key_snapshot,notes,paid_at,created_by
          ) VALUES(?,?,?,?, 'paid', ?, ?, NOW(), ?)
        ");
        $ins->execute([
            $photographerId,
            $gross,
            $amount,
            count($rows),
            $photographer['pix_key']?:null,
            $notes?:null,
            current_user_id()
        ]);
        $payoutId=(int)$pdo->lastInsertId();

        $insItem=$pdo->prepare("
          INSERT INTO photographer_payout_items(
            payout_id,order_item_id,gross_amount,commission_percent,commission_amount
          ) VALUES(?,?,?,?,?)
        ");
        foreach($rows as $row){
            $insItem->execute([
                $payoutId,
                (int)$row['order_item_id'],
                round((float)$row['_gross'],2),
                (float)$row['commission_percent'],
                round((float)$row['_commission'],2)
            ]);
        }

        $pdo->commit();
        json_ok([
            'payout_id'=>$payoutId,
            'photographer_id'=>$photographerId,
            'gross_amount'=>$gross,
            'amount'=>$amount,
            'item_count'=>count($rows),
            'status'=>'paid'
        ]);
    }catch(Throwable $e){
        if($pdo->inTransaction())$pdo->rollBack();
        json_error('Não foi possível registrar o repasse: '.$e->getMessage(),422);
    }
}

json_error('Método não permitido.',405);
