<?php
session_start();

$ip = $_SERVER['REMOTE_ADDR'];
$agora = time();

// arquivo onde vamos salvar acessos
$arquivo = __DIR__ . '/ips.json';

// cria arquivo se não existir
if (!file_exists($arquivo)) {
    file_put_contents($arquivo, json_encode([]));
}

$ips = json_decode(file_get_contents($arquivo), true);

// limpa IPs antigos (mais de 1 minuto)
foreach ($ips as $key => $dados) {
    if ($agora - $dados['tempo'] > 60) {
        unset($ips[$key]);
    }
}

// se IP já existe
if (isset($ips[$ip])) {
    $ips[$ip]['contador']++;

    // 🚨 se passar de 20 acessos por minuto → bloqueia
    if ($ips[$ip]['contador'] > 20) {
        http_response_code(429);
        die("Acesso bloqueado temporariamente.");
    }

} else {
    // novo IP
    $ips[$ip] = [
        'contador' => 1,
        'tempo' => $agora
    ];
}

// salva novamente
file_put_contents($arquivo, json_encode($ips));