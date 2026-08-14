<?php
require_once __DIR__.'/../config/bootstrap.php';

if($_SERVER['REQUEST_METHOD']!=='POST') json_error('Método não permitido.',405);
$d=body();
$name=trim((string)($d['customer_name']??''));
$email=trim((string)($d['customer_email']??''));
$items=$d['items']??[];

if($name===''||!filter_var($email,FILTER_VALIDATE_EMAIL)||!is_array($items)||!count($items))
    json_error('Informe nome, e-mail válido e pelo menos uma foto.',422);

try{
    $pdo->beginTransaction();
    $total=0; $valid=[]; $seen=[];
    $q=$pdo->prepare("SELECT p.id,p.price,p.photographer_id,pp.commission_percent
                      FROM photos p
                      LEFT JOIN photographer_profiles pp ON pp.user_id=p.photographer_id
                      WHERE p.id=?");

    foreach($items as $item){
        $id=(int)($item['photo_id']??0);
        if(!$id || isset($seen[$id])) continue;
        $seen[$id]=true;
        $q->execute([$id]); $photo=$q->fetch();
        if(!$photo) continue; // ignora IDs órfãos do carrinho/localStorage
        $price=(float)$photo['price'];
        $photographerId=!empty($photo['photographer_id'])?(int)$photo['photographer_id']:null;
        $commission=$photographerId!==null?(float)($photo['commission_percent']??60):null;
        $total+=$price;
        $valid[]=[$id,$price,$photographerId,$commission];
    }

    if(!$valid) throw new RuntimeException('Nenhuma foto válida no pedido.');

    $publicToken=bin2hex(random_bytes(32));
    $logged=current_user();
    $customerId=null;
    if($logged && ($logged['role']??'')==='customer'){
        $customerId=(int)$logged['id'];
        $name=(string)$logged['name'];
        $email=(string)$logged['email'];
    }
    $s=$pdo->prepare("INSERT INTO orders(customer_id,customer_name,customer_email,total,status,public_token) VALUES(?,?,?,?,'pending',?)");
    $s->execute([$customerId,$name,$email,$total,$publicToken]);
    $order=(int)$pdo->lastInsertId();

    $i=$pdo->prepare("INSERT INTO order_items(
        order_id,photo_id,photographer_id,quantity,unit_price,photographer_commission_percent
    ) VALUES(?,?,?,1,?,?)");
    foreach($valid as [$id,$price,$photographerId,$commission]){
        $i->execute([$order,$id,$photographerId,$price,$commission]);
    }

    $pdo->commit();
    json_ok([
        'order_id'=>$order,
        'order_token'=>$publicToken,
        'total'=>$total,
        'status'=>'pending',
        'order_url'=>'pedido.html?token='.$publicToken
    ]);
}catch(Throwable $e){
    if($pdo->inTransaction()) $pdo->rollBack();
    json_error('Não foi possível criar o pedido: '.$e->getMessage(),500);
}
