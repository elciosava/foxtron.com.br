<?php
require_once __DIR__.'/../config/bootstrap.php';
require_once __DIR__.'/../config/settings.php';
require_admin();

if($_SERVER['REQUEST_METHOD']==='GET'){
    json_ok([
        'settings'=>[
            'photo_price'=>app_photo_price($pdo),
            'default_photographer_commission'=>app_default_photographer_commission($pdo),
            'photographer_can_change_price'=>app_photographer_can_change_price($pdo),
        ]
    ]);
}

if($_SERVER['REQUEST_METHOD']==='PATCH'){
    $d=body();

    $price=round((float)($d['photo_price']??14.90),2);
    $commission=round((float)($d['default_photographer_commission']??60),2);

    if($price<1 || $price>9999) json_error('Preço inválido.',422);
    if($commission<0 || $commission>100) json_error('Comissão inválida.',422);

    // Por enquanto fica propositalmente bloqueado para fotógrafo.
    $canChange=false;

    $pdo->beginTransaction();
    try{
        $up=$pdo->prepare("
          INSERT INTO app_settings(setting_key,setting_value)
          VALUES(?,?)
          ON DUPLICATE KEY UPDATE setting_value=VALUES(setting_value)
        ");
        $up->execute(['photo_price',number_format($price,2,'.','')]);
        $up->execute(['default_photographer_commission',number_format($commission,2,'.','')]);
        $up->execute(['photographer_can_change_price',$canChange?'1':'0']);

        // O preço global passa a valer nas fotos publicadas.
        // Pedidos antigos NÃO mudam, pois order_items.unit_price é snapshot.
        $pdo->prepare("UPDATE photos SET price=?")->execute([$price]);

        // A comissão global passa a valer para vendas futuras de todos os fotógrafos.
        // Comissões de vendas antigas ficam congeladas em order_items.
        $pdo->prepare("UPDATE photographer_profiles SET commission_percent=?")->execute([$commission]);

        $pdo->commit();
    }catch(Throwable $e){
        if($pdo->inTransaction())$pdo->rollBack();
        json_error('Não foi possível salvar as configurações de venda.',500);
    }

    json_ok([
        'settings'=>[
            'photo_price'=>$price,
            'default_photographer_commission'=>$commission,
            'photographer_can_change_price'=>false,
        ]
    ]);
}

json_error('Método não permitido.',405);
