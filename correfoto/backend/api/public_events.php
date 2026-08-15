<?php
require_once __DIR__.'/../config/bootstrap.php';

$cols=$pdo->query("SHOW COLUMNS FROM events")->fetchAll(PDO::FETCH_COLUMN);
$dateCol=in_array('event_date',$cols,true)?'event_date':(in_array('date',$cols,true)?'date':null);
if(!$dateCol) json_error('A tabela events não possui a coluna de data esperada.',500);

$hasCover=in_array('cover_image',$cols,true);
$coverExpr=$hasCover
    ? "COALESCE(NULLIF(e.cover_image,''),(SELECT p.public_path FROM photos p WHERE p.event_id=e.id ORDER BY p.id DESC LIMIT 1))"
    : "(SELECT p.public_path FROM photos p WHERE p.event_id=e.id ORDER BY p.id DESC LIMIT 1)";

$sql="
  SELECT
    e.id,
    e.name,
    e.{$dateCol} AS event_date,
    e.location,
    e.status,
    (SELECT COUNT(*) FROM photos p WHERE p.event_id=e.id) AS photo_count,
    {$coverExpr} AS cover_path
  FROM events e
  WHERE e.status='active'
  ORDER BY e.{$dateCol} ASC,e.id ASC
";
$s=$pdo->query($sql);
json_ok(['events'=>$s->fetchAll()]);
