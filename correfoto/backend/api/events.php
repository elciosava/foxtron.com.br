<?php
require_once __DIR__.'/../config/bootstrap.php';

$cols=$pdo->query("SHOW COLUMNS FROM events")->fetchAll(PDO::FETCH_COLUMN);
$dateCol=in_array('event_date',$cols,true)?'event_date':(in_array('date',$cols,true)?'date':null);
if(!$dateCol) json_error('A tabela events não possui a coluna de data esperada. Importe backend/sql/schema.sql.',500);

$hasCover=in_array('cover_image',$cols,true);

if($_SERVER['REQUEST_METHOD']==='GET'){
    $coverSelect=$hasCover?',cover_image':'';
    $sql="SELECT id,name,{$dateCol} AS event_date,location{$coverSelect},status FROM events ORDER BY {$dateCol} DESC,id DESC";
    $s=$pdo->query($sql);
    json_ok(['events'=>$s->fetchAll()]);
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    require_admin();

    // multipart/form-data quando houver imagem; JSON continua aceito por compatibilidade.
    $contentType=(string)($_SERVER['CONTENT_TYPE']??'');
    $d=str_contains(strtolower($contentType),'multipart/form-data') ? $_POST : body();

    $name=trim((string)($d['name']??''));
    $date=trim((string)($d['event_date']??($d['date']??'')));
    $loc=trim((string)($d['location']??''));

    if($name===''||$date==='') json_error('Nome e data são obrigatórios.',422);
    if(!preg_match('/^\d{4}-\d{2}-\d{2}$/',$date)) json_error('Data inválida.',422);

    $coverPath=null;

    if(isset($_FILES['cover']) && $_FILES['cover']['error']!==UPLOAD_ERR_NO_FILE){
        $f=$_FILES['cover'];

        if($f['error']!==UPLOAD_ERR_OK){
            json_error('Falha ao enviar a capa do evento.',400);
        }

        if((int)$f['size']>8*1024*1024){
            json_error('A capa do evento ultrapassa 8 MB.',413);
        }

        $mime=(new finfo(FILEINFO_MIME_TYPE))->file($f['tmp_name']);
        $ext=['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp'][$mime]??null;
        if(!$ext) json_error('Formato de capa inválido. Use JPG, PNG ou WEBP.',415);

        $dir=realpath(__DIR__.'/..').DIRECTORY_SEPARATOR.'event-covers';
        if(!is_dir($dir) && !@mkdir($dir,0777,true)){
            json_error('Não foi possível criar a pasta de capas.',500);
        }
        if(!is_writable($dir)){
            json_error('backend/event-covers não tem permissão de escrita.',500);
        }

        $filename=bin2hex(random_bytes(16)).'.'.$ext;
        $dest=$dir.DIRECTORY_SEPARATOR.$filename;

        if(!move_uploaded_file($f['tmp_name'],$dest)){
            json_error('Não foi possível salvar a capa do evento.',500);
        }

        $coverPath='backend/event-covers/'.$filename;
    }

    try{
        if($hasCover){
            $sql="INSERT INTO events(name,{$dateCol},location,cover_image,status) VALUES(?,?,?,?,'active')";
            $s=$pdo->prepare($sql);
            $s->execute([$name,$date,$loc?:null,$coverPath]);
        }else{
            // Compatibilidade caso a migration ainda não tenha sido aplicada.
            $sql="INSERT INTO events(name,{$dateCol},location,status) VALUES(?,?,?,'active')";
            $s=$pdo->prepare($sql);
            $s->execute([$name,$date,$loc?:null]);
        }
    }catch(Throwable $e){
        if($coverPath){
            $abs=realpath(__DIR__.'/..').DIRECTORY_SEPARATOR.str_replace('/','\\',substr($coverPath,strlen('backend/')));
            if(is_file($abs)) @unlink($abs);
        }
        json_error('Não foi possível cadastrar o evento.',500);
    }

    json_ok([
        'id'=>(int)$pdo->lastInsertId(),
        'cover_image'=>$coverPath
    ]);
}

json_error('Método não permitido.',405);
