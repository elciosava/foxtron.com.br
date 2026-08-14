<?php
declare(strict_types=1);
require_once __DIR__.'/config/database.php';
require_once __DIR__.'/config/media.php';

$token=trim((string)($_GET['token']??''));
if(!preg_match('/^[a-f0-9]{64}$/',$token)){
    http_response_code(404); exit('Link inválido.');
}

$s=$pdo->prepare("SELECT od.id,od.download_count,od.max_downloads,od.expires_at,p.filename,o.status
 FROM order_downloads od
 JOIN orders o ON o.id=od.order_id
 JOIN photos p ON p.id=od.photo_id
 WHERE od.token=? LIMIT 1");
$s->execute([$token]);
$row=$s->fetch();

if(!$row || $row['status']!=='paid'){
    http_response_code(403); exit('Download não autorizado.');
}
if(strtotime((string)$row['expires_at'])<time()){
    http_response_code(410); exit('Este link expirou.');
}
if((int)$row['download_count'] >= (int)$row['max_downloads']){
    http_response_code(429); exit('Limite de downloads atingido.');
}

$file=media_original_dir().DIRECTORY_SEPARATOR.$row['filename'];
if(!is_file($file)){
    http_response_code(404); exit('Arquivo original não encontrado.');
}

$pdo->prepare("UPDATE order_downloads SET download_count=download_count+1 WHERE id=?")->execute([$row['id']]);

$mime=(new finfo(FILEINFO_MIME_TYPE))->file($file) ?: 'application/octet-stream';
$downloadName='CorreFoto-'.basename($row['filename']);
header('Content-Type: '.$mime);
header('Content-Length: '.filesize($file));
header('Content-Disposition: attachment; filename="'.$downloadName.'"');
header('X-Content-Type-Options: nosniff');
header('Cache-Control: private, no-store, max-age=0');
readfile($file);
exit;
