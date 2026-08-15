<?php
require_once __DIR__.'/../config/bootstrap.php';
require_once __DIR__.'/../config/settings.php';

json_ok([
    'settings'=>[
        'photo_price'=>app_photo_price($pdo),
        'default_photographer_commission'=>app_default_photographer_commission($pdo),
        'photographer_can_change_price'=>app_photographer_can_change_price($pdo),
    ]
]);
