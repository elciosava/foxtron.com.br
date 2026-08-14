<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__.'/../config/bootstrap.php';
require_admin();
require_once __DIR__.'/../config/media.php';
require_once __DIR__.'/../config/shirt_color.php';

$id=(int)($_GET['photo_id']??0);
if(!$id) json_error('Informe photo_id.',422);

$s=$pdo->prepare("SELECT id,filename,shirt_color FROM photos WHERE id=? LIMIT 1");
$s->execute([$id]);
$p=$s->fetch();
if(!$p) json_error('Foto não encontrada.',404);

$path=media_original_path($p['filename']);
$result=detect_shirt_color($path);

json_ok([
    'photo_id'=>$id,
    'current_color'=>$p['shirt_color'],
    'detected'=>$result
]);
