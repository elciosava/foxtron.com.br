<?php
require_once __DIR__.'/../config/bootstrap.php';
$u=require_login();

$s=$pdo->prepare("SELECT id,total,status,public_token,paid_at,created_at
                  FROM orders
                  WHERE customer_id=? OR (customer_id IS NULL AND LOWER(customer_email)=LOWER(?))
                  ORDER BY id DESC");
$s->execute([(int)$u['id'],(string)$u['email']]);
json_ok(['orders'=>$s->fetchAll()]);
