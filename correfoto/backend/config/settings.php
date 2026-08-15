<?php

function app_setting(PDO $pdo, string $key, string $default=''): string {
    static $cache=[];
    if(array_key_exists($key,$cache)) return $cache[$key];

    try{
        $s=$pdo->prepare("SELECT setting_value FROM app_settings WHERE setting_key=? LIMIT 1");
        $s->execute([$key]);
        $value=$s->fetchColumn();
        if($value===false) $value=$default;
    }catch(Throwable $e){
        // Compatibilidade antes da migration.
        $value=$default;
    }

    $cache[$key]=(string)$value;
    return $cache[$key];
}

function app_photo_price(PDO $pdo): float {
    $value=(float)app_setting($pdo,'photo_price','14.90');
    return round(max(0.01,$value),2);
}

function app_default_photographer_commission(PDO $pdo): float {
    $value=(float)app_setting($pdo,'default_photographer_commission','60.00');
    return round(max(0,min(100,$value)),2);
}

function app_photographer_can_change_price(PDO $pdo): bool {
    return app_setting($pdo,'photographer_can_change_price','0')==='1';
}
