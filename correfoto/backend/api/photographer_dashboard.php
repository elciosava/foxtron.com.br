<?php
require_once __DIR__.'/../config/bootstrap.php';
$u=require_roles('photographer');
$uid=(int)$u['id'];

$profile=$pdo->prepare("
  SELECT phone,pix_key,commission_percent,approved_at
  FROM photographer_profiles
  WHERE user_id=?
");
$profile->execute([$uid]);
$profileRow=$profile->fetch()?:[
    'phone'=>null,'pix_key'=>null,'commission_percent'=>60,'approved_at'=>null
];

$stats=$pdo->prepare("
  SELECT
    (SELECT COUNT(*) FROM photos WHERE photographer_id=?) photo_count,

    (SELECT COUNT(*)
       FROM order_items oi
       JOIN orders o ON o.id=oi.order_id AND o.status='paid'
      WHERE oi.photographer_id=?) sold_count,

    (SELECT COALESCE(SUM(oi.unit_price*oi.quantity),0)
       FROM order_items oi
       JOIN orders o ON o.id=oi.order_id AND o.status='paid'
      WHERE oi.photographer_id=?) gross_sales,

    (SELECT COALESCE(SUM(
        oi.unit_price*oi.quantity*
        COALESCE(oi.photographer_commission_percent,pp.commission_percent,60)/100
      ),0)
       FROM order_items oi
       JOIN orders o ON o.id=oi.order_id AND o.status='paid'
       LEFT JOIN photographer_profiles pp ON pp.user_id=oi.photographer_id
      WHERE oi.photographer_id=?) earned_commission,

    (SELECT COALESCE(SUM(po.amount),0)
       FROM photographer_payouts po
      WHERE po.photographer_id=? AND po.status='paid') paid_out
");
$stats->execute([$uid,$uid,$uid,$uid,$uid]);
$st=$stats->fetch();

$earned=round((float)($st['earned_commission']??0),2);
$paid=round((float)($st['paid_out']??0),2);

$q=$pdo->prepare("
  SELECT p.id,p.public_path,p.ocr_status,p.captured_at,p.shirt_color,p.created_at,e.name event_name,
         (SELECT GROUP_CONCAT(pb.bib_number ORDER BY pb.bib_number SEPARATOR ',')
            FROM photo_bibs pb WHERE pb.photo_id=p.id AND pb.confirmed=1) bib_numbers,
         (SELECT COUNT(*)
            FROM order_items oi JOIN orders o ON o.id=oi.order_id
           WHERE oi.photo_id=p.id AND o.status='paid') sales_count
  FROM photos p JOIN events e ON e.id=p.event_id
  WHERE p.photographer_id=?
  ORDER BY p.id DESC LIMIT 100
");
$q->execute([$uid]);

$payouts=$pdo->prepare("
  SELECT id,gross_amount,amount,item_count,status,pix_key_snapshot,paid_at,created_at
  FROM photographer_payouts
  WHERE photographer_id=?
  ORDER BY id DESC
  LIMIT 30
");
$payouts->execute([$uid]);

json_ok([
    'profile'=>$profileRow,
    'stats'=>[
        'photos'=>(int)($st['photo_count']??0),
        'sold'=>(int)($st['sold_count']??0),
        'gross'=>round((float)($st['gross_sales']??0),2),
        'commission_percent'=>(float)($profileRow['commission_percent']??60),
        'commission_value'=>$earned,
        'paid_out'=>$paid,
        'balance_due'=>round(max(0,$earned-$paid),2),
    ],
    'photos'=>$q->fetchAll(),
    'payouts'=>$payouts->fetchAll()
]);
