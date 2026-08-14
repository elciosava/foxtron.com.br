<?php
header('Content-Type: text/plain; charset=utf-8');
set_time_limit(120);

require_once __DIR__.'/../config/ocr.php';

$python=find_python_exe();
$test=realpath(__DIR__.'/../ocr/test_environment.py');

echo "TESTE OCR POR ARQUIVO\n\n";
echo "Python: ".($python ?: 'NAO ENCONTRADO')."\n";
echo "Teste: ".($test ?: 'NAO ENCONTRADO')."\n\n";

if(!$python || !$test){
    echo "ERRO: Python ou arquivo de teste nao encontrados.\n";
    exit;
}

/*
 * Não usa python -c; portanto elimina completamente o problema
 * de aspas dentro do código Python.
 */
$cmd='"'.str_replace('"','\"',$python).'" "'
    .str_replace('"','\"',$test).'" 2>&1';

echo "Comando:\n".$cmd."\n\n";
echo "Resultado:\n";

$result=@shell_exec($cmd);

if($result===null){
    echo "ERRO: shell_exec retornou NULL.\n";
}else{
    echo $result;
}
