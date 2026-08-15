<?php
require_once __DIR__.'/../config/bootstrap.php';
require_admin();

if ($_SERVER['REQUEST_METHOD']==='GET') {
    $role=trim((string)($_GET['role']??''));
    $where=[];$args=[];
    if(in_array($role,['admin','customer','photographer'],true)){
        $where[]='u.role=?';$args[]=$role;
    }
    $sql="SELECT u.id,u.name,u.email,u.role,u.status,u.created_at,
                 pp.phone,pp.pix_key,pp.commission_percent,pp.approved_at,
                 pp.terms_version,pp.terms_accepted_at
          FROM users u
          LEFT JOIN photographer_profiles pp ON pp.user_id=u.id";
    if($where)$sql.=' WHERE '.implode(' AND ',$where);
    $sql.=' ORDER BY FIELD(u.role,"photographer","admin","customer"),u.id DESC';
    $s=$pdo->prepare($sql);$s->execute($args);
    json_ok(['users'=>$s->fetchAll()]);
}

if ($_SERVER['REQUEST_METHOD']==='PATCH') {
    $d=body();
    $id=(int)($d['id']??0);
    if(!$id) json_error('Usuário inválido.',422);

    $q=$pdo->prepare("SELECT id,role,status FROM users WHERE id=? LIMIT 1");
    $q->execute([$id]);$target=$q->fetch();
    if(!$target) json_error('Usuário não encontrado.',404);

    $status=(string)($d['status']??$target['status']);
    $role=(string)($d['role']??$target['role']);
    if(!in_array($status,['active','pending','blocked'],true)) json_error('Status inválido.',422);
    if(!in_array($role,['admin','customer','photographer'],true)) json_error('Perfil inválido.',422);

    // Evita bloquear/rebaixar acidentalmente a própria sessão de admin.
    if($id===current_user_id() && ($status!=='active'||$role!=='admin')){
        json_error('Você não pode remover seu próprio acesso de administrador por esta tela.',422);
    }

    $commission=null;
    if(array_key_exists('commission_percent',$d)){
        $commission=max(0,min(100,(float)$d['commission_percent']));
    }

    $pdo->beginTransaction();
    try{
        $pdo->prepare("UPDATE users SET role=?,status=? WHERE id=?")->execute([$role,$status,$id]);

        if($role==='photographer'){
            $pdo->prepare("INSERT IGNORE INTO photographer_profiles(user_id,commission_percent) VALUES(?,60.00)")->execute([$id]);
            if($commission!==null){
                $pdo->prepare("UPDATE photographer_profiles SET commission_percent=? WHERE user_id=?")->execute([$commission,$id]);
            }
            if($status==='active'){
                $pdo->prepare("UPDATE photographer_profiles SET approved_at=COALESCE(approved_at,NOW()) WHERE user_id=?")->execute([$id]);
            }
        }
        $pdo->commit();
    }catch(Throwable $e){
        if($pdo->inTransaction())$pdo->rollBack();
        json_error('Não foi possível atualizar o usuário.',500);
    }
    json_ok(['id'=>$id,'role'=>$role,'status'=>$status]);
}

json_error('Método não permitido.',405);
