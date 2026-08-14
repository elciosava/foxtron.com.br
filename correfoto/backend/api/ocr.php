<?php
ini_set('display_errors','0');
set_time_limit(120);

require_once __DIR__.'/../config/bootstrap.php';
require_once __DIR__.'/../config/ocr.php';
require_once __DIR__.'/../config/media.php';

if($_SERVER['REQUEST_METHOD']!=='POST') json_error('Método não permitido.',405);
$actor=require_photographer_or_admin();

$d=body();
$id=(int)($d['photo_id']??0);
if(!$id) json_error('Foto inválida.',422);

function win_quote(string $value): string {
    return '"'.str_replace('"','\\"',$value).'"';
}

try {
    $s=$pdo->prepare("SELECT id,filename,photographer_id FROM photos WHERE id=? LIMIT 1");
    $s->execute([$id]);
    $photo=$s->fetch();
    if(!$photo) json_error('Foto não encontrada.',404);
    if($actor['role']==='photographer' && (int)$photo['photographer_id']!==(int)$actor['id']) json_error('Esta foto pertence a outro fotógrafo.',403);

    $image=media_original_path($photo['filename']);
    $script=realpath(__DIR__.'/../ocr/ocr_bib.py');
    $python=find_python_exe();

    ocr_log("=== OCR photo_id={$id} ===");
    ocr_log("python=".($python ?: 'NAO ENCONTRADO'));
    ocr_log("script=".($script ?: 'NAO ENCONTRADO'));
    ocr_log("image=".($image ?: 'NAO ENCONTRADA'));

    if(!$python || !is_file($python)){
        $pdo->prepare("UPDATE photos SET ocr_status='error' WHERE id=?")->execute([$id]);
        json_error('Python não encontrado pelo PHP. Veja backend/logs/ocr.log.',500);
    }
    if(!$script || !$image){
        $pdo->prepare("UPDATE photos SET ocr_status='error' WHERE id=?")->execute([$id]);
        json_error('Script OCR ou foto não encontrados. Veja backend/logs/ocr.log.',500);
    }

    /*
     * IMPORTANTE: usa exatamente o formato que foi validado no XAMPP:
     * "C:\\Python314\\python.exe" "...\\ocr_bib.py" "...\\foto.webp" 2>&1
     * Não usa escapeshellarg aqui porque no Windows/CMD o comportamento pode
     * divergir do comando que já comprovamos funcionar.
     */
    $cmd = win_quote($python).' '.win_quote($script).' '.win_quote($image).' 2>&1';
    ocr_log("cmd={$cmd}");

    $output=@shell_exec($cmd);
    if($output===null){
        ocr_log('shell_exec retornou NULL');
        $pdo->prepare("UPDATE photos SET ocr_status='error' WHERE id=?")->execute([$id]);
        json_error('PHP não conseguiu executar o OCR. Veja backend/logs/ocr.log.',500);
    }

    $output=trim($output);
    ocr_log("raw_output={$output}");
    $result=json_decode($output,true);

    if(!is_array($result) || empty($result['ok'])){
        $pdo->prepare("UPDATE photos SET ocr_status='error' WHERE id=?")->execute([$id]);
        $jsonError=json_last_error_msg();
        ocr_log("json_error={$jsonError}");
        json_error('OCR executou, mas a resposta não pôde ser lida: '.$jsonError.'. Veja backend/logs/ocr.log.',500);
    }

    // Normaliza e remove leituras muito pequenas (ruído visual).
    $normalized=[];
    foreach(($result['candidates']??[]) as $c){
        $num=preg_replace('/\D/','',(string)($c['number']??''));
        if($num==='' || strlen($num)>6) continue;

        $conf=max(0,min(100,(float)($c['confidence']??0)));
        $w=(int)($c['w']??0);
        $h=(int)($c['h']??0);

        if(strlen($num)===1 && ($w<20 || $h<15)) continue;
        if(strlen($num)>=2 && ($w<15 || $h<10)) continue;

        if(!isset($normalized[$num]) || $conf>$normalized[$num]['confidence']){
            $normalized[$num]=[
                'number'=>$num,
                'confidence'=>$conf,
                'x'=>(int)($c['x']??0),
                'y'=>(int)($c['y']??0),
                'w'=>$w,
                'h'=>$h,
                'source'=>(string)($c['source']??'ocr')
            ];
        }
    }

    $candidates=array_values($normalized);
    usort($candidates,fn($a,$b)=>$b['confidence']<=>$a['confidence']);

    /*
     * Sugestão automática conservadora:
     * - pega o melhor candidato;
     * - se ele tiver >= 80%, já preenche sozinho;
     * - os demais continuam aparecendo como badges para revisão.
     * Na sua foto: 381 = 96%, então o input será preenchido com 381.
     */
    $suggested=[];
    if($candidates){
        $best=$candidates[0];
        if($best['confidence']>=80 || count($candidates)===1){
            $suggested[]=$best['number'];
        }
    }

    // Se nenhum atingiu o limiar, respeita a primeira sugestão válida do Python.
    if(!$suggested){
        foreach(($result['suggested']??[]) as $n){
            $n=preg_replace('/\D/','',(string)$n);
            if($n!=='' && isset($normalized[$n])){
                $suggested[]=$n;
                break;
            }
        }
    }

    // Salvar candidatos não pode impedir o número de aparecer no navegador.
    $dbWarning=null;
    try{
        $pdo->beginTransaction();
        $pdo->prepare("DELETE FROM photo_bibs WHERE photo_id=? AND confirmed=0")->execute([$id]);
        $ins=$pdo->prepare("INSERT IGNORE INTO photo_bibs(photo_id,bib_number,confidence,source,confirmed) VALUES(?,?,?,'ocr',0)");
        foreach($candidates as $c){
            $ins->execute([$id,$c['number'],$c['confidence']]);
        }
        $status=$candidates?'review':'none';
        $pdo->prepare("UPDATE photos SET ocr_status=? WHERE id=?")->execute([$status,$id]);
        $pdo->commit();
    }catch(Throwable $dbError){
        if($pdo->inTransaction()) $pdo->rollBack();
        $dbWarning=$dbError->getMessage();
        ocr_log('DB WARNING: '.$dbWarning);
        // OCR funcionou: não marcamos como error só por causa da persistência.
    }

    json_ok([
        'photo_id'=>$id,
        'engine'=>$result['engine']??'OCR',
        'candidates'=>$candidates,
        'suggested'=>$suggested,
        'best'=>$candidates[0]??null,
        'warning'=>$dbWarning ? 'OCR reconheceu o número, mas houve aviso ao salvar candidatos: '.$dbWarning : null
    ]);

}catch(Throwable $e){
    if(isset($pdo) && $pdo->inTransaction()) $pdo->rollBack();
    ocr_log('FATAL: '.$e->getMessage().' em '.$e->getFile().':'.$e->getLine());
    if(isset($id) && $id){
        try{$pdo->prepare("UPDATE photos SET ocr_status='error' WHERE id=?")->execute([$id]);}catch(Throwable $ignore){}
    }
    json_error('Erro interno no OCR: '.$e->getMessage().'. Veja backend/logs/ocr.log.',500);
}
