<?php
require_once __DIR__.'/../config/bootstrap.php';
$u=require_roles('photographer');
$uid=(int)$u['id'];

if($_SERVER['REQUEST_METHOD']==='PATCH'){
    $d=body();
    $phone=trim((string)($d['phone']??''));
    $pix=trim((string)($d['pix_key']??''));

    if(mb_strlen($phone)>40) json_error('Telefone muito longo.',422);
    if(mb_strlen($pix)>190) json_error('Chave PIX muito longa.',422);

    $pdo->prepare("
      INSERT INTO photographer_profiles(user_id,phone,pix_key,commission_percent)
      VALUES(?,?,?,60.00)
      ON DUPLICATE KEY UPDATE phone=VALUES(phone),pix_key=VALUES(pix_key)
    ")->execute([$uid,$phone?:null,$pix?:null]);

    json_ok(['phone'=>$phone,'pix_key'=>$pix]);
}

json_error('Método não permitido.',405);
