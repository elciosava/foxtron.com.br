<?php
require_once __DIR__.'/../config/bootstrap.php';

// Compatibilidade com bancos criados por versões anteriores do projeto.
$cols=$pdo->query("SHOW COLUMNS FROM events")->fetchAll(PDO::FETCH_COLUMN);
$dateCol=in_array('event_date',$cols,true)?'event_date':(in_array('date',$cols,true)?'date':null);
if(!$dateCol) json_error('A tabela events não possui a coluna de data esperada. Importe backend/sql/schema.sql.',500);

if($_SERVER['REQUEST_METHOD']==='GET'){
    $sql="SELECT id,name,{$dateCol} AS event_date,location,status FROM events ORDER BY {$dateCol} DESC,id DESC";
    $s=$pdo->query($sql);
    json_ok(['events'=>$s->fetchAll()]);
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    require_admin();
    $d=body();
    $name=trim((string)($d['name']??''));
    $date=trim((string)($d['event_date']??($d['date']??'')));
    $loc=trim((string)($d['location']??''));
    if($name===''||$date==='') json_error('Nome e data são obrigatórios.',422);
    if(!preg_match('/^\d{4}-\d{2}-\d{2}$/',$date)) json_error('Data inválida.',422);
    $sql="INSERT INTO events(name,{$dateCol},location,status) VALUES(?,?,?,'active')";
    $s=$pdo->prepare($sql);
    $s->execute([$name,$date,$loc?:null]);
    json_ok(['id'=>(int)$pdo->lastInsertId()]);
}
json_error('Método não permitido.',405);
