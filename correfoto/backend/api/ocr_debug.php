<?php
require_once __DIR__.'/../config/bootstrap.php';
require_admin();

$id=(int)($_GET['photo_id']??0);
if(!$id) json_error('Informe photo_id.',422);

$s=$pdo->prepare("
    SELECT p.id,p.filename,p.ocr_status,
           b.bib_number,b.confidence,b.source,b.confirmed
    FROM photos p
    LEFT JOIN photo_bibs b ON b.photo_id=p.id
    WHERE p.id=?
    ORDER BY b.confidence DESC
");
$s->execute([$id]);

json_ok(['rows'=>$s->fetchAll()]);
