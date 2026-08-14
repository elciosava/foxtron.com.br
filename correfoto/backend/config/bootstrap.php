<?php
declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    ini_set('session.use_strict_mode', '1');
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/database.php';

function body(): array {
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);
    return is_array($data) ? $data : $_POST;
}

function json_ok(array $data=[]): never {
    echo json_encode(['ok'=>true] + $data, JSON_UNESCAPED_UNICODE);
    exit;
}

function json_error(string $message, int $code=400): never {
    http_response_code($code);
    echo json_encode(['ok'=>false,'error'=>$message], JSON_UNESCAPED_UNICODE);
    exit;
}

function current_user(): ?array {
    $u = $_SESSION['user'] ?? null;
    return is_array($u) ? $u : null;
}

function current_user_id(): ?int {
    $u = current_user();
    return $u ? (int)$u['id'] : null;
}

function require_login(): array {
    $u = current_user();
    if (!$u) json_error('Faça login para continuar.', 401);
    if (($u['status'] ?? 'active') === 'blocked') json_error('Esta conta está bloqueada.', 403);
    return $u;
}

function require_roles(array|string $roles): array {
    $u = require_login();
    $roles = is_array($roles) ? $roles : [$roles];
    if (!in_array((string)($u['role'] ?? ''), $roles, true)) {
        json_error('Você não tem permissão para acessar este recurso.', 403);
    }
    if (($u['role'] ?? '') === 'photographer' && ($u['status'] ?? '') !== 'active') {
        json_error('Seu cadastro de fotógrafo ainda não foi aprovado.', 403);
    }
    return $u;
}

function require_admin(): array {
    return require_roles('admin');
}

function require_photographer_or_admin(): array {
    return require_roles(['photographer','admin']);
}
