<?php
/*
 * Mercado Pago - CorreFoto
 *
 * NUNCA coloque o Access Token em JavaScript ou envie este arquivo para
 * repositório público com credenciais reais.
 *
 * Opção recomendada: definir variáveis de ambiente no servidor.
 */
$MP_ACCESS_TOKEN = getenv('MP_ACCESS_TOKEN') ?: '';
$MP_PUBLIC_KEY = getenv('MP_PUBLIC_KEY') ?: '';
$MP_WEBHOOK_SECRET = getenv('MP_WEBHOOK_SECRET') ?: '';

/*
 * URL pública HTTPS do CorreFoto, SEM barra no final.
 * Ex.: https://fotos.seudominio.com/CorreFoto
 */
$CORREFOTO_BASE_URL = rtrim(getenv('CORREFOTO_BASE_URL') ?: '', '/');

/* true = usa sandbox_init_point quando a API disponibilizar. */
$MP_USE_SANDBOX = filter_var(getenv('MP_USE_SANDBOX') ?: '1', FILTER_VALIDATE_BOOLEAN);

/*
 * Para teste rápido você pode preencher temporariamente aqui:
 * $MP_ACCESS_TOKEN = 'TEST-...';
 * $MP_WEBHOOK_SECRET = '...';
 * $CORREFOTO_BASE_URL = 'https://seu-dominio/CorreFoto';
 */

// Sobrescritas locais (ignorado pelo Git). Ideal para Windows/XAMPP sem variáveis de ambiente.
$mpLocal=__DIR__.'/mercadopago.local.php';
if(is_file($mpLocal)) require $mpLocal;
