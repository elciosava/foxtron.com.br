<?php
require_once __DIR__.'/../config/bootstrap.php';
$bib=trim((string)($_GET['bib']??'')); $event=(int)($_GET['event_id']??0);
if($bib==='') json_error('Informe o número do corredor.',422);
$sql="SELECT p.id,p.public_path,p.price,e.id event_id,e.name event_name,e.event_date,
      (SELECT GROUP_CONCAT(pb2.bib_number ORDER BY pb2.bib_number SEPARATOR ',') FROM photo_bibs pb2 WHERE pb2.photo_id=p.id AND pb2.confirmed=1) bib_numbers
      FROM photos p JOIN events e ON e.id=p.event_id
      WHERE EXISTS(SELECT 1 FROM photo_bibs pb WHERE pb.photo_id=p.id AND pb.confirmed=1 AND pb.bib_number=?)";
$args=[$bib]; if($event){$sql.=" AND e.id=?";$args[]=$event;} $sql.=" ORDER BY p.id DESC";
$s=$pdo->prepare($sql);$s->execute($args); json_ok(['photos'=>$s->fetchAll()]);
