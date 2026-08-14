<?php
require_once __DIR__.'/../config/mercadopago.php';

function mp_is_configured(): bool {
    global $MP_ACCESS_TOKEN, $MP_PUBLIC_KEY, $CORREFOTO_BASE_URL;
    return trim($MP_ACCESS_TOKEN) !== '' && trim($MP_PUBLIC_KEY) !== '' && preg_match('#^https://#i', $CORREFOTO_BASE_URL);
}

function mp_request(string $method, string $path, ?array $payload = null): array {
    global $MP_ACCESS_TOKEN;
    if(trim($MP_ACCESS_TOKEN)==='') throw new RuntimeException('Access Token do Mercado Pago não configurado.');
    if(!function_exists('curl_init')) throw new RuntimeException('Extensão cURL do PHP não está habilitada.');

    $url='https://api.mercadopago.com'.$path;
    $ch=curl_init($url);
    $headers=[
        'Authorization: Bearer '.$MP_ACCESS_TOKEN,
        'Content-Type: application/json',
        'Accept: application/json'
    ];
    curl_setopt_array($ch,[
        CURLOPT_RETURNTRANSFER=>true,
        CURLOPT_TIMEOUT=>30,
        CURLOPT_CONNECTTIMEOUT=>10,
        CURLOPT_CUSTOMREQUEST=>$method,
        CURLOPT_HTTPHEADER=>$headers,
        CURLOPT_SSL_VERIFYPEER=>true,
        CURLOPT_SSL_VERIFYHOST=>2,
    ]);
    if($payload!==null){
        curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($payload,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));
    }
    $raw=curl_exec($ch);
    if($raw===false){
        $error=curl_error($ch);curl_close($ch);
        throw new RuntimeException('Falha de comunicação com Mercado Pago: '.$error);
    }
    $status=(int)curl_getinfo($ch,CURLINFO_HTTP_CODE);
    curl_close($ch);
    $data=json_decode($raw,true);
    if(!is_array($data)) throw new RuntimeException('Mercado Pago retornou resposta inválida.');
    if($status<200||$status>=300){
        $message=$data['message']??$data['error']??('HTTP '.$status);
        if(!empty($data['cause'][0]['description'])) $message.=' - '.$data['cause'][0]['description'];
        throw new RuntimeException('Mercado Pago: '.$message);
    }
    return $data;
}

function mp_create_preference(array $order, array $items): array {
    global $CORREFOTO_BASE_URL, $MP_USE_SANDBOX;
    if(!preg_match('#^https://#i',$CORREFOTO_BASE_URL)){
        throw new RuntimeException('CORREFOTO_BASE_URL precisa ser uma URL HTTPS pública.');
    }

    $mpItems=[];
    foreach($items as $item){
        $mpItems[]=[
            'id'=>(string)$item['photo_id'],
            'title'=>'Foto digital - '.($item['event_name']?:'CorreFoto'),
            'description'=>!empty($item['bib_numbers']) ? 'Número de peito '.$item['bib_numbers'] : 'Foto #'.$item['photo_id'],
            'quantity'=>1,
            'currency_id'=>'BRL',
            'unit_price'=>(float)$item['unit_price'],
            'category_id'=>'others'
        ];
    }

    $token=$order['public_token'];
    $return=$CORREFOTO_BASE_URL.'/pedido.html?token='.rawurlencode($token);
    $payload=[
        'items'=>$mpItems,
        'payer'=>[
            'name'=>$order['customer_name'],
            'email'=>$order['customer_email']
        ],
        'external_reference'=>(string)$order['id'],
        'back_urls'=>[
            'success'=>$return.'&mp=success',
            'pending'=>$return.'&mp=pending',
            'failure'=>$return.'&mp=failure'
        ],
        'auto_return'=>'approved',
        'notification_url'=>$CORREFOTO_BASE_URL.'/backend/webhooks/mercadopago.php',
        'statement_descriptor'=>'CORREFOTO',
        'metadata'=>[
            'correfoto_order_id'=>(int)$order['id']
        ]
    ];

    $pref=mp_request('POST','/checkout/preferences',$payload);
    $checkout=$MP_USE_SANDBOX && !empty($pref['sandbox_init_point'])
        ? $pref['sandbox_init_point']
        : ($pref['init_point']??null);
    if(!$checkout) throw new RuntimeException('Mercado Pago não retornou URL de checkout.');
    return ['preference'=>$pref,'checkout_url'=>$checkout];
}

function mp_get_payment(string $paymentId): array {
    if(!preg_match('/^\d+$/',$paymentId)) throw new RuntimeException('ID de pagamento inválido.');
    return mp_request('GET','/v1/payments/'.rawurlencode($paymentId));
}

/* Validação manual da assinatura Webhook segundo o formato do Mercado Pago. */
function mp_validate_webhook_signature(string $xSignature, string $xRequestId, string $dataId): bool {
    global $MP_WEBHOOK_SECRET;
    if(trim($MP_WEBHOOK_SECRET)==='') return false;
    $parts=[];
    foreach(explode(',',$xSignature) as $part){
        [$k,$v]=array_pad(explode('=',trim($part),2),2,'');
        if($k!==''&&$v!=='') $parts[$k]=$v;
    }
    $ts=$parts['ts']??'';$v1=$parts['v1']??'';
    if($ts===''||$v1===''||$xRequestId===''||$dataId==='') return false;
    $normalizedDataId=preg_match('/[A-Za-z]/',$dataId)?strtolower($dataId):$dataId;
    $manifest='id:'.$normalizedDataId.';request-id:'.$xRequestId.';ts:'.$ts.';';
    $expected=hash_hmac('sha256',$manifest,$MP_WEBHOOK_SECRET);
    return hash_equals($expected,$v1);
}
