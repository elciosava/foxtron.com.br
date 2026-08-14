<?php
header('Content-Type: application/json; charset=utf-8');
set_time_limit(120);
require_once __DIR__.'/../config/bootstrap.php';
require_admin();
require_once __DIR__.'/../config/ocr.php';

$id=(int)($_GET['photo_id']??0);
if(!$id) json_error('Informe photo_id.',422);

$s=$pdo->prepare("SELECT filename FROM photos WHERE id=? LIMIT 1");
$s->execute([$id]);
$p=$s->fetch();
if(!$p) json_error('Foto não encontrada.',404);

$python=find_python_exe();
$script=realpath(__DIR__.'/../ocr/ocr_bib.py');
$image=realpath(__DIR__.'/../uploads/'.$p['filename']);
if(!$python||!$script||!$image) json_error('Python, script ou imagem não encontrados.',500);

$q=fn($v)=>'"'.str_replace('"','\\"',$v).'"';
$cmd=$q($python).' '.$q($script).' '.$q($image).' 2>&1';
$out=shell_exec($cmd);
$result=json_decode(trim((string)$out),true);

json_ok([
  'command'=>$cmd,
  'decoded'=>$result,
  'raw'=>$out
]);
