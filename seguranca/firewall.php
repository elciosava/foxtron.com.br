<?php
$ip = $_SERVER['REMOTE_ADDR'];

$whitelist = ['191.253.31.17', '127.0.0.1', '::1'];

if (in_array($ip, $whitelist)) {
    // libera totalmente e NÃO executa firewall
    return;
}
session_start();

$ip = $_SERVER['REMOTE_ADDR'];
$userAgent = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');
$agora = time();

$arquivoIps = __DIR__ . '/ips.json';
$arquivoBlacklist = __DIR__ . '/blacklist.json';

// cria arquivos se não existir
if (!file_exists($arquivoIps)) file_put_contents($arquivoIps, json_encode([]));
if (!file_exists($arquivoBlacklist)) file_put_contents($arquivoBlacklist, json_encode([]));

$ips = json_decode(file_get_contents($arquivoIps), true);
if (!is_array($ips)) $ips = [];

$blacklist = json_decode(file_get_contents($arquivoBlacklist), true);
if (!is_array($blacklist)) $blacklist = [];

// 🚫 1. BLOQUEIO PERMANENTE
if (in_array($ip, $blacklist)) {
    http_response_code(403);
    die("IP bloqueado.");
}


// 🤖 2. BLOQUEIO POR USER-AGENT
$bots = ['curl', 'python', 'wget', 'bot', 'crawler', 'spider'];

foreach ($bots as $bot) {
    if (strpos($userAgent, $bot) !== false) {
        bloquear($ip, $blacklist, $arquivoBlacklist);
    }
}
// 🤖🤖

// 🌎 3. BLOQUEIO POR PAÍS (COM CACHE)
if (!isset($ips[$ip]['pais'])) {

    $dados = @json_decode(file_get_contents("http://ip-api.com/json/$ip"), true);
    $pais = $dados['countryCode'] ?? 'XX';

    $ips[$ip]['pais'] = $pais;
} else {
    $pais = $ips[$ip]['pais'];
}

// bloqueia se não for BR
$pais = $dados['countryCode'] ?? 'BR';


// ⚡ 4. RATE LIMIT (ANTI-SPAM)
if (!isset($ips[$ip])) {
    $ips[$ip] = [
        'contador' => 1,
        'tempo' => $agora
    ];
} else {

    // reset a cada 60s
    if ($agora - $ips[$ip]['tempo'] > 60) {
        $ips[$ip]['contador'] = 1;
        $ips[$ip]['tempo'] = $agora;
    } else {
        $ips[$ip]['contador']++;
    }

    // 🚨 mais de 30 requisições/min → bloqueia
    if ($ips[$ip]['contador'] > 30) {
        bloquear($ip, $blacklist, $arquivoBlacklist);
    }
}


// 💾 salva dados
file_put_contents($arquivoIps, json_encode($ips));


// 🔧 FUNÇÃO DE BLOQUEIO
function bloquear($ip, &$blacklist, $arquivo) {
    $blacklist[] = $ip;
    file_put_contents($arquivo, json_encode(array_unique($blacklist)));

    http_response_code(403);
    die("Acesso bloqueado.");
}