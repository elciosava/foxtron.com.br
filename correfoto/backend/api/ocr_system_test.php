<?php
require_once __DIR__.'/../config/bootstrap.php';
require_admin();
require_once __DIR__.'/../config/ocr_process.php';

$photoId=(int)($_GET['photo_id']??0);

$python=find_working_python();

$data=[
    'php_os'=>PHP_OS_FAMILY,
    'php_version'=>PHP_VERSION,
    'php_binary'=>PHP_BINARY,
    'proc_open_available'=>function_exists('proc_open'),
    'disable_functions'=>ini_get('disable_functions'),
    'path'=>getenv('PATH'),
    'python_probe'=>$python,
];

if($photoId && $python['ok']){
    $s=$pdo->prepare("SELECT filename FROM photos WHERE id=? LIMIT 1");
    $s->execute([$photoId]);
    $photo=$s->fetch();

    if($photo){
        $image=realpath(__DIR__.'/../uploads/'.$photo['filename']);
        $script=realpath(__DIR__.'/../ocr/ocr_bib.py');

        if($image && $script){
            $cmd=array_merge($python['command'],[$script,$image]);
            $data['ocr_command']=$cmd;
            $data['ocr_result']=run_process_array($cmd,90);
        }
    }
}

json_ok(['diagnostic'=>$data]);
