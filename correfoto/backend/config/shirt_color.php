<?php
require_once __DIR__.'/ocr.php';
require_once __DIR__.'/photo_metadata.php';

function detect_shirt_color(string $imagePath): array {
    if(!is_file($imagePath)){
        return ['ok'=>false,'color'=>null,'confidence'=>0,'error'=>'Imagem não encontrada.'];
    }

    $python=find_python_exe();
    $script=realpath(__DIR__.'/../vision/shirt_color.py');

    if(!$python || !$script){
        return ['ok'=>false,'color'=>null,'confidence'=>0,'error'=>'Python ou classificador de cor não encontrado.'];
    }

    // Mesmo padrão de execução que já funciona no OCR do Windows/XAMPP.
    $cmd='"'.str_replace('"','\"',$python).'" "'
        .str_replace('"','\"',$script).'" "'
        .str_replace('"','\"',$imagePath).'" 2>&1';

    $raw=@shell_exec($cmd);
    if(!is_string($raw) || trim($raw)===''){
        return ['ok'=>false,'color'=>null,'confidence'=>0,'error'=>'Classificador não retornou resposta.'];
    }

    $data=json_decode(trim($raw),true);
    if(!is_array($data) || empty($data['ok'])){
        return [
            'ok'=>false,
            'color'=>null,
            'confidence'=>0,
            'error'=>is_array($data)?($data['error']??'Falha ao classificar cor.'):'Resposta inválida do classificador.'
        ];
    }

    $color=photo_normalize_color($data['color']??'');
    return [
        'ok'=>true,
        'color'=>$color,
        'confidence'=>(float)($data['confidence']??0),
        'scores'=>$data['scores']??[]
    ];
}
