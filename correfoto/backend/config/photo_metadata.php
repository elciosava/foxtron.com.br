<?php
function photo_capture_datetime(string $path): ?string {
    if(!is_file($path) || !function_exists('exif_read_data')) return null;
    try{
        $exif=@exif_read_data($path,'ANY_TAG',true,false);
        if(!is_array($exif)) return null;
        $values=[
            $exif['EXIF']['DateTimeOriginal']??null,
            $exif['EXIF']['DateTimeDigitized']??null,
            $exif['IFD0']['DateTime']??null,
            $exif['COMPUTED']['DateTimeOriginal']??null,
        ];
        foreach($values as $value){
            if(!$value) continue;
            $dt=DateTime::createFromFormat('Y:m:d H:i:s',(string)$value);
            if($dt) return $dt->format('Y-m-d H:i:s');
        }
    }catch(Throwable $e){}
    return null;
}

function photo_allowed_colors(): array {
    return ['preto','branco','cinza','vermelho','azul','verde','amarelo','laranja','roxo','rosa','marrom','multicolor','outro'];
}

function photo_normalize_color($value): ?string {
    $value=strtolower(trim((string)$value));
    return in_array($value,photo_allowed_colors(),true)?$value:null;
}

function photo_normalize_datetime($value): ?string {
    $value=trim((string)$value);
    if($value==='') return null;
    foreach(['Y-m-d H:i:s','Y-m-d\\TH:i','Y-m-d\\TH:i:s'] as $fmt){
        $dt=DateTime::createFromFormat($fmt,$value);
        if($dt) return $dt->format('Y-m-d H:i:s');
    }
    return null;
}
