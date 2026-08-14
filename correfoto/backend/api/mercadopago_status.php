<?php
require_once __DIR__.'/../config/bootstrap.php';
require_admin();
require_once __DIR__.'/../lib/mercadopago.php';
if($_SERVER['REQUEST_METHOD']!=='GET')json_error('Método não permitido.',405);
json_ok([
 'configured'=>mp_is_configured(),
 'public_key_configured'=>trim($MP_PUBLIC_KEY)!=='',
 'curl'=>function_exists('curl_init'),
 'base_url_https'=>(bool)preg_match('#^https://#i',$CORREFOTO_BASE_URL),
 'webhook_secret_configured'=>trim($MP_WEBHOOK_SECRET)!=='',
 'sandbox'=>$MP_USE_SANDBOX
]);
