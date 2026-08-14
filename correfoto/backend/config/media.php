<?php
require_once __DIR__.'/ocr.php';

function media_original_dir(): string {
    $dir=__DIR__.'/../storage/originals';
    if(!is_dir($dir)) @mkdir($dir,0775,true);
    return realpath($dir) ?: $dir;
}
function media_preview_dir(): string {
    $dir=__DIR__.'/../previews';
    if(!is_dir($dir)) @mkdir($dir,0775,true);
    return realpath($dir) ?: $dir;
}
function media_legacy_upload_dir(): string {
    $dir=__DIR__.'/../uploads';
    if(!is_dir($dir)) @mkdir($dir,0775,true);
    return realpath($dir) ?: $dir;
}
function media_original_path(string $filename): ?string {
    $filename=basename($filename);
    foreach([
        media_original_dir().DIRECTORY_SEPARATOR.$filename,
        media_legacy_upload_dir().DIRECTORY_SEPARATOR.$filename,
    ] as $candidate){
        if(is_file($candidate)) return realpath($candidate) ?: $candidate;
    }
    return null;
}
function media_preview_name(string $filename): string {
    return pathinfo($filename,PATHINFO_FILENAME).'.webp';
}
function media_preview_path(string $filename): string {
    return media_preview_dir().DIRECTORY_SEPARATOR.media_preview_name($filename);
}
function media_public_preview(string $filename): string {
    return 'backend/previews/'.media_preview_name($filename);
}
function media_quote(string $value): string {
    if(PHP_OS_FAMILY==='Windows') return '"'.str_replace('"','\\"',$value).'"';
    return escapeshellarg($value);
}
function media_generate_preview(string $original,string $preview): array {
    $python=find_python_exe();
    $script=realpath(__DIR__.'/../media/generate_preview.py');
    if(!$python || !is_file($python)) return ['ok'=>false,'error'=>'Python não encontrado para gerar a prévia.'];
    if(!$script || !is_file($script)) return ['ok'=>false,'error'=>'Gerador de prévia não encontrado.'];
    $cmd=media_quote($python).' '.media_quote($script).' '.media_quote($original).' '.media_quote($preview).' 2>&1';
    $raw=@shell_exec($cmd);
    if($raw===null) return ['ok'=>false,'error'=>'PHP não conseguiu executar o gerador de prévia.'];
    $data=json_decode(trim($raw),true);
    if(!is_array($data) || empty($data['ok'])) return ['ok'=>false,'error'=>is_array($data)?($data['error']??'Falha ao gerar prévia.'):'Resposta inválida do gerador: '.substr(trim($raw),0,300)];
    return $data;
}
