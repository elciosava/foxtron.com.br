<?php
// Webhook Mercado Pago: responde rápido, valida assinatura e consulta o pagamento na API.
require_once __DIR__.'/../config/database.php';
require_once __DIR__.'/../lib/mercadopago.php';
require_once __DIR__.'/../lib/order_payment.php';

header('Content-Type: application/json; charset=utf-8');
$raw=file_get_contents('php://input');
$body=json_decode($raw,true) ?: [];
$type=(string)($_GET['type']??($body['type']??''));
$dataId=(string)($_GET['data.id']??($body['data']['id']??''));
$requestId=(string)($_SERVER['HTTP_X_REQUEST_ID']??'');
$signature=(string)($_SERVER['HTTP_X_SIGNATURE']??'');

$logDir=__DIR__.'/../logs';if(!is_dir($logDir))@mkdir($logDir,0777,true);
$log=function(string $m)use($logDir){@file_put_contents($logDir.'/mercadopago.log','['.date('Y-m-d H:i:s').'] '.$m.PHP_EOL,FILE_APPEND);};

if($type!=='payment'||$dataId===''){
    http_response_code(200);echo json_encode(['ok'=>true,'ignored'=>true]);exit;
}

if(!mp_validate_webhook_signature($signature,$requestId,$dataId)){
    $log('Assinatura inválida payment='.$dataId.' request='.$requestId);
    http_response_code(401);echo json_encode(['ok'=>false]);exit;
}

try{
    $payment=mp_get_payment($dataId);
    $pdo->beginTransaction();
    $result=correfoto_apply_mp_payment($pdo,$payment);
    $pdo->commit();
    $log('OK payment='.$dataId.' status='.($payment['status']??'').' order='.$result['order_id']);
    http_response_code(200);echo json_encode(['ok'=>true]);
}catch(Throwable $e){
    if($pdo->inTransaction())$pdo->rollBack();

    $message=$e->getMessage();
    $log('ERRO payment='.$dataId.' '.$message);

    /*
     * O simulador oficial do Mercado Pago envia um ID fictício (ex.: 123456).
     * A assinatura é válida, mas esse pagamento não existe na API e a consulta
     * retorna 404/not found. Nesse caso devemos confirmar o recebimento com 200,
     * pois não há nada real para processar e um 500 faria o simulador falhar.
     *
     * Em erros reais de infraestrutura/API continuamos respondendo 500 para que
     * o Mercado Pago possa tentar novamente.
     */
    $notFound = stripos($message,'not found')!==false
        || stripos($message,'not_found')!==false
        || stripos($message,'resource not found')!==false
        || stripos($message,'não encontrado')!==false;

    if($notFound){
        $log('IGNORADO payment='.$dataId.' recurso inexistente/simulador');
        http_response_code(200);
        echo json_encode(['ok'=>true,'ignored'=>true,'reason'=>'payment_not_found']);
        exit;
    }

    // Falhas transitórias reais devem ser reenviadas pelo provedor.
    http_response_code(500);echo json_encode(['ok'=>false]);
}
