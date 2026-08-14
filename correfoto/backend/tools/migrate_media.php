<?php
if(PHP_SAPI!=='cli'){
    http_response_code(403);
    exit("Este script só pode ser executado pelo terminal.\n");
}
require_once __DIR__.'/../config/database.php';
require_once __DIR__.'/../config/media.php';

$legacy=media_legacy_upload_dir();
$originals=media_original_dir();
$previews=media_preview_dir();

$photos=$pdo->query("SELECT id,filename,public_path FROM photos ORDER BY id")->fetchAll();
$ok=0;$fail=0;$skip=0;

echo "CorreFoto - migração de mídia protegida\n";
echo "Fotos no banco: ".count($photos)."\n\n";

foreach($photos as $p){
    $id=(int)$p['id'];
    $filename=basename((string)$p['filename']);
    $legacyFile=$legacy.DIRECTORY_SEPARATOR.$filename;
    $originalFile=$originals.DIRECTORY_SEPARATOR.$filename;
    $previewFile=media_preview_path($filename);
    $public=media_public_preview($filename);

    echo "#{$id} {$filename}: ";

    if(!is_file($originalFile)){
        if(is_file($legacyFile)){
            if(!@rename($legacyFile,$originalFile)){
                if(!@copy($legacyFile,$originalFile)){
                    echo "ERRO ao mover original\n";$fail++;continue;
                }
                @unlink($legacyFile);
            }
        }else{
            echo "original não encontrado\n";$fail++;continue;
        }
    }

    if(!is_file($previewFile)){
        $r=media_generate_preview($originalFile,$previewFile);
        if(empty($r['ok'])){
            echo "ERRO preview: ".($r['error']??'desconhecido')."\n";$fail++;continue;
        }
    }

    if((string)$p['public_path']!==$public){
        $u=$pdo->prepare("UPDATE photos SET public_path=? WHERE id=?");
        $u->execute([$public,$id]);
    }else{$skip++;}
    echo "OK -> {$public}\n";$ok++;
}

echo "\nConcluído. OK={$ok} | já ajustadas={$skip} | falhas={$fail}\n";
if($fail) exit(1);
