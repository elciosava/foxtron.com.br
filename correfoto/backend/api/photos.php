<?php
require_once __DIR__.'/../config/bootstrap.php';
require_once __DIR__.'/../config/media.php';
require_once __DIR__.'/../config/photo_metadata.php';
require_once __DIR__.'/../config/shirt_color.php';

if($_SERVER['REQUEST_METHOD']==='GET'){
    $event=(int)($_GET['event_id']??0);
    $bib=trim((string)($_GET['bib']??''));
    $ids=trim((string)($_GET['ids']??''));
    $timeFrom=trim((string)($_GET['time_from']??''));
    $timeTo=trim((string)($_GET['time_to']??''));
    $shirtColor=photo_normalize_color($_GET['shirt_color']??'');

    $sql="SELECT p.id,p.event_id,p.filename,p.public_path,p.bib_number,p.price,p.ocr_status,
                 p.captured_at,p.shirt_color,e.name event_name,
          (SELECT GROUP_CONCAT(pb.bib_number ORDER BY pb.bib_number SEPARATOR ',')
           FROM photo_bibs pb WHERE pb.photo_id=p.id AND pb.confirmed=1) bib_numbers
          FROM photos p JOIN events e ON e.id=p.event_id WHERE 1=1";
    $args=[];

    if($event){$sql.=" AND p.event_id=?";$args[]=$event;}

    if($ids!==''){
        $idList=array_values(array_filter(array_unique(array_map('intval',preg_split('/[,;\\s]+/',$ids,-1,PREG_SPLIT_NO_EMPTY))),fn($v)=>$v>0));
        if($idList){
            $sql.=' AND p.id IN ('.implode(',',array_fill(0,count($idList),'?')).')';
            foreach($idList as $v)$args[]=$v;
        }
    }

    if($bib!==''){
        $sql.=" AND EXISTS(SELECT 1 FROM photo_bibs bx WHERE bx.photo_id=p.id AND bx.confirmed=1 AND bx.bib_number=?)";
        $args[]=$bib;
    }

    if(preg_match('/^\\d{2}:\\d{2}$/',$timeFrom) && preg_match('/^\\d{2}:\\d{2}$/',$timeTo)){
        $sql.=" AND p.captured_at IS NOT NULL AND TIME(p.captured_at) BETWEEN ? AND ?";
        $args[]=$timeFrom.':00';
        $args[]=$timeTo.':59';
    }

    if($shirtColor){$sql.=" AND p.shirt_color=?";$args[]=$shirtColor;}

    $sql.=" ORDER BY COALESCE(p.captured_at,p.created_at) DESC,p.id DESC";
    $s=$pdo->prepare($sql);$s->execute($args);
    json_ok(['photos'=>$s->fetchAll()]);
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $actor=require_photographer_or_admin();
    $event=(int)($_POST['event_id']??0);
    if(!$event||!isset($_FILES['photo'])) json_error('Evento e foto são obrigatórios.',422);

    $check=$pdo->prepare("SELECT id FROM events WHERE id=? LIMIT 1");
    $check->execute([$event]);
    if(!$check->fetch()) json_error('Evento não encontrado.',422);

    $f=$_FILES['photo'];
    if($f['error']!==UPLOAD_ERR_OK){
        $errors=[
            UPLOAD_ERR_INI_SIZE=>'A foto excede upload_max_filesize do PHP.',
            UPLOAD_ERR_FORM_SIZE=>'A foto excede o limite do formulário.',
            UPLOAD_ERR_PARTIAL=>'Upload parcial.',
            UPLOAD_ERR_NO_FILE=>'Nenhuma foto enviada.',
            UPLOAD_ERR_NO_TMP_DIR=>'Pasta temporária não encontrada.',
            UPLOAD_ERR_CANT_WRITE=>'O PHP não conseguiu gravar o arquivo.',
            UPLOAD_ERR_EXTENSION=>'Uma extensão interrompeu o upload.'
        ];
        json_error($errors[$f['error']]??'Falha no upload.',400);
    }
    if((int)$f['size']>25*1024*1024) json_error('A foto ultrapassa 25 MB.',413);

    $mime=(new finfo(FILEINFO_MIME_TYPE))->file($f['tmp_name']);
    $ext=['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp'][$mime]??null;
    if(!$ext) json_error('Formato inválido. Use JPG, PNG ou WEBP.',415);

    // JPEGs de câmera normalmente trazem DateTimeOriginal. Se não houver EXIF,
    // o horário pode ser preenchido manualmente depois na Biblioteca do admin.
    $capturedAt=photo_capture_datetime($f['tmp_name']);

    $originalDir=media_original_dir();
    $previewDir=media_preview_dir();
    if(!is_dir($originalDir)||!is_writable($originalDir)) json_error('backend/storage/originals não tem permissão de escrita.',500);
    if(!is_dir($previewDir)||!is_writable($previewDir)) json_error('backend/previews não tem permissão de escrita.',500);

    $name=bin2hex(random_bytes(16)).'.'.$ext;
    $dest=$originalDir.DIRECTORY_SEPARATOR.$name;
    if(!move_uploaded_file($f['tmp_name'],$dest)) json_error('Não foi possível salvar a foto original.',500);
    if(!$capturedAt) $capturedAt=photo_capture_datetime($dest);

    $preview=media_preview_path($name);
    $previewResult=media_generate_preview($dest,$preview);
    if(empty($previewResult['ok'])){
        @unlink($dest);
        json_error('A foto foi recebida, mas não foi possível gerar a prévia com marca d’água: '.($previewResult['error']??'erro desconhecido'),500);
    }

    // A detecção de cor é auxiliar e NÃO pode derrubar o upload.
    // Em caso de dúvida/erro, fica NULL e pode ser corrigida manualmente no Admin.
    $shirtDetection=detect_shirt_color($dest);
    $shirtColor=!empty($shirtDetection['ok']) ? ($shirtDetection['color']??null) : null;

    $public=media_public_preview($name);
    $photographerId=($actor['role']==='photographer')?(int)$actor['id']:null;
    $s=$pdo->prepare("INSERT INTO photos(event_id,photographer_id,filename,public_path,bib_number,price,ocr_status,captured_at,shirt_color)
                     VALUES(?,?,?,?,?,?,'pending',?,?)");
    try{$s->execute([$event,$photographerId,$name,$public,null,19.90,$capturedAt,$shirtColor]);}
    catch(Throwable $e){@unlink($dest);@unlink($preview);json_error('Não foi possível registrar a foto no banco.',500);}

    json_ok([
        'id'=>(int)$pdo->lastInsertId(),
        'path'=>$public,
        'filename'=>$name,
        'preview'=>$public,
        'captured_at'=>$capturedAt,
        'shirt_color'=>$shirtColor,
        'shirt_color_confidence'=>(float)($shirtDetection['confidence']??0)
    ]);
}

if($_SERVER['REQUEST_METHOD']==='PATCH'){
    $actor=require_photographer_or_admin();
    $d=body();$id=(int)($d['id']??0);
    if(!$id) json_error('Foto inválida.',422);
    $q=$pdo->prepare("SELECT id,photographer_id FROM photos WHERE id=?");$q->execute([$id]);$owned=$q->fetch();
    if(!$owned)json_error('Foto não encontrada.',404);
    if($actor['role']==='photographer' && (int)$owned['photographer_id']!==(int)$actor['id']) json_error('Esta foto pertence a outro fotógrafo.',403);

    $hasBibs=array_key_exists('bib_numbers',$d)||array_key_exists('bib_number',$d);
    $hasCaptured=array_key_exists('captured_at',$d);
    $hasColor=array_key_exists('shirt_color',$d);

    $pdo->beginTransaction();
    try{
        if($hasBibs){
            $raw=$d['bib_numbers']??($d['bib_number']??'');
            $parts=is_array($raw)?$raw:preg_split('/[,;\\s]+/',(string)$raw,-1,PREG_SPLIT_NO_EMPTY);
            $map=[];
            foreach($parts as $value){$n=preg_replace('/\\D/','',(string)$value);if($n!==''&&strlen($n)<=6)$map[$n]=true;}
            $numbers=array_keys($map);
            $pdo->prepare("DELETE FROM photo_bibs WHERE photo_id=?")->execute([$id]);
            $ins=$pdo->prepare("INSERT INTO photo_bibs(photo_id,bib_number,confidence,source,confirmed) VALUES(?,?,100,'manual',1)");
            foreach($numbers as $n)$ins->execute([$id,$n]);
            $legacy=$numbers[0]??null;
            $pdo->prepare("UPDATE photos SET bib_number=?,ocr_status='confirmed' WHERE id=?")->execute([$legacy,$id]);
        }

        if($hasCaptured){
            $captured=photo_normalize_datetime($d['captured_at']??'');
            $pdo->prepare("UPDATE photos SET captured_at=? WHERE id=?")->execute([$captured,$id]);
        }

        if($hasColor){
            $rawColor=trim((string)($d['shirt_color']??''));
            $color=$rawColor===''?null:photo_normalize_color($rawColor);
            if($rawColor!==''&&!$color) throw new RuntimeException('Cor de camiseta inválida.');
            $pdo->prepare("UPDATE photos SET shirt_color=? WHERE id=?")->execute([$color,$id]);
        }

        $pdo->commit();
    }catch(Throwable $e){
        if($pdo->inTransaction())$pdo->rollBack();
        json_error($e->getMessage()?:'Não foi possível atualizar a foto.',500);
    }
    json_ok(['id'=>$id]);
}

json_error('Método não permitido.',405);
