<?php
require_once __DIR__.'/../config/bootstrap.php';
require_once __DIR__.'/../config/settings.php';

function public_user(array $u): array {
    return [
        'id'=>(int)$u['id'],
        'name'=>(string)$u['name'],
        'email'=>(string)$u['email'],
        'role'=>(string)$u['role'],
        'status'=>(string)($u['status'] ?? 'active'),
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    json_ok(['user'=>current_user()]);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $p=session_get_cookie_params();
        setcookie(session_name(), '', time()-42000, $p['path'], $p['domain']??'', $p['secure'], $p['httponly']);
    }
    session_destroy();
    json_ok();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') json_error('Método não permitido.',405);

$d=body();
$action=(string)($d['action']??'login');

if ($action === 'register') {
    $name=trim((string)($d['name']??''));
    $email=strtolower(trim((string)($d['email']??'')));
    $password=(string)($d['password']??'');
    $role=(string)($d['role']??'customer');
    $phone=trim((string)($d['phone']??''));
    $photographerTermsAccepted=filter_var($d['photographer_terms_accepted']??false,FILTER_VALIDATE_BOOLEAN);
    $photographerTermsVersion=trim((string)($d['photographer_terms_version']??''));

    if (mb_strlen($name)<2) json_error('Informe seu nome.',422);
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) json_error('Informe um e-mail válido.',422);
    if (strlen($password)<8) json_error('A senha deve ter pelo menos 8 caracteres.',422);
    if (!in_array($role,['customer','photographer'],true)) $role='customer';

    if($role==='photographer'){
        if(!$photographerTermsAccepted){
            json_error('É necessário aceitar os Termos do Fotógrafo para concluir o cadastro.',422);
        }
        if($photographerTermsVersion!=='2026-08-14-v1'){
            json_error('A versão dos Termos do Fotógrafo está desatualizada. Recarregue a página e tente novamente.',409);
        }
    }

    $status=$role==='photographer'?'pending':'active';
    $hash=password_hash($password,PASSWORD_DEFAULT);

    try {
        $pdo->beginTransaction();
        $s=$pdo->prepare("INSERT INTO users(name,email,password_hash,role,status) VALUES(?,?,?,?,?)");
        $s->execute([$name,$email,$hash,$role,$status]);
        $id=(int)$pdo->lastInsertId();

        if ($role==='photographer') {
            $defaultCommission=app_default_photographer_commission($pdo);
            $p=$pdo->prepare("INSERT INTO photographer_profiles(
                user_id,phone,commission_percent,terms_version,terms_accepted_at
            ) VALUES(?,?,?,?,NOW())");
            $p->execute([$id,$phone?:null,$defaultCommission,'2026-08-14-v1']);
        }
        $pdo->commit();
    } catch (PDOException $e) {
        if ($pdo->inTransaction()) $pdo->rollBack();
        if ((int)$e->errorInfo[1]===1062) json_error('Já existe uma conta com este e-mail.',409);
        json_error('Não foi possível criar a conta.',500);
    }

    $u=['id'=>$id,'name'=>$name,'email'=>$email,'role'=>$role,'status'=>$status];

    // Cliente entra imediatamente. Fotógrafo aguarda aprovação e também fica logado,
    // podendo visualizar o status da solicitação.
    session_regenerate_id(true);
    $_SESSION['user']=$u;

    json_ok([
        'user'=>$u,
        'pending_approval'=>$role==='photographer',
        'message'=>$role==='photographer'
            ? 'Cadastro recebido. O administrador precisa aprovar seu perfil de fotógrafo.'
            : 'Conta criada com sucesso.'
    ]);
}

if ($action === 'login') {
    $email=strtolower(trim((string)($d['email']??'')));
    $password=(string)($d['password']??'');
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)||$password==='') json_error('E-mail ou senha inválidos.',422);

    $s=$pdo->prepare("SELECT id,name,email,password_hash,role,status FROM users WHERE email=? LIMIT 1");
    $s->execute([$email]);
    $u=$s->fetch();

    if (!$u || !password_verify($password,$u['password_hash'])) {
        json_error('E-mail ou senha incorretos.',401);
    }
    if (($u['status']??'active')==='blocked') {
        json_error('Esta conta está bloqueada. Fale com o administrador.',403);
    }

    unset($u['password_hash']);
    $u=public_user($u);
    session_regenerate_id(true);
    $_SESSION['user']=$u;

    json_ok(['user'=>$u]);
}

json_error('Ação inválida.',422);
