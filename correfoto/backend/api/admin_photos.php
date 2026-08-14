<?php
require_once __DIR__.'/../config/bootstrap.php';
require_admin();
require_once __DIR__.'/../config/media.php';

if($_SERVER['REQUEST_METHOD']==='GET'){
    $event=(int)($_GET['event_id']??0);
    $status=trim((string)($_GET['status']??''));
    $bib=preg_replace('/\\D/','',(string)($_GET['bib']??''));
    $color=trim((string)($_GET['shirt_color']??''));
    $page=max(1,(int)($_GET['page']??1));
    $limit=min(100,max(12,(int)($_GET['limit']??24)));
    $offset=($page-1)*$limit;

    $where=['1=1']; $args=[];
    if($event){$where[]='p.event_id=?';$args[]=$event;}
    if(in_array($status,['pending','review','none','confirmed','error'],true)){$where[]='p.ocr_status=?';$args[]=$status;}
    if($bib!==''){
        $where[]='EXISTS(SELECT 1 FROM photo_bibs bx WHERE bx.photo_id=p.id AND bx.bib_number=?)';
        $args[]=$bib;
    }
    if($color!==''){
        $where[]='p.shirt_color=?';
        $args[]=$color;
    }
    $whereSql=implode(' AND ',$where);

    $count=$pdo->prepare("SELECT COUNT(*) FROM photos p WHERE {$whereSql}");
    $count->execute($args);
    $total=(int)$count->fetchColumn();

    $sql="SELECT p.id,p.event_id,p.filename,p.public_path,p.price,p.ocr_status,p.captured_at,p.shirt_color,p.created_at,e.name event_name
          FROM photos p JOIN events e ON e.id=p.event_id
          WHERE {$whereSql}
          ORDER BY p.id DESC LIMIT {$limit} OFFSET {$offset}";
    $s=$pdo->prepare($sql);$s->execute($args);
    $photos=$s->fetchAll();

    if($photos){
        $ids=array_map(fn($p)=>(int)$p['id'],$photos);
        $marks=implode(',',array_fill(0,count($ids),'?'));
        $b=$pdo->prepare("SELECT photo_id,bib_number,confidence,source,confirmed FROM photo_bibs WHERE photo_id IN ({$marks}) ORDER BY confirmed DESC,confidence DESC,id ASC");
        $b->execute($ids);
        $by=[];
        foreach($b->fetchAll() as $row){$by[(int)$row['photo_id']][]=$row;}
        foreach($photos as &$p){$p['bibs']=$by[(int)$p['id']]??[];}
        unset($p);
    }

    json_ok(['photos'=>$photos,'page'=>$page,'limit'=>$limit,'total'=>$total,'pages'=>max(1,(int)ceil($total/$limit))]);
}

if($_SERVER['REQUEST_METHOD']==='DELETE'){
    $d=body(); $id=(int)($d['id']??0);
    if(!$id) json_error('Foto inválida.',422);

    $s=$pdo->prepare("SELECT filename,public_path FROM photos WHERE id=? LIMIT 1");
    $s->execute([$id]);$photo=$s->fetch();
    if(!$photo) json_error('Foto não encontrada.',404);

    try{
        $pdo->beginTransaction();
        $pdo->prepare("DELETE FROM photos WHERE id=?")->execute([$id]);
        $pdo->commit();
    }catch(Throwable $e){
        if($pdo->inTransaction())$pdo->rollBack();
        json_error('Não foi possível excluir a foto do banco.',500);
    }

    $original=media_original_path($photo['filename']);
    if($original && is_file($original)) @unlink($original);
    $preview=media_preview_path($photo['filename']);
    if(is_file($preview)) @unlink($preview);
    json_ok(['id'=>$id]);
}

json_error('Método não permitido.',405);
