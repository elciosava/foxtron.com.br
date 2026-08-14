<?php
header('Content-Type: text/plain; charset=utf-8');
set_time_limit(120);

require_once __DIR__.'/../config/ocr.php';

echo "TESTE OCR XAMPP\n\n";

$python=find_python_exe();
echo "Python: ".($python ?: 'NAO ENCONTRADO')."\n";
echo "shell_exec: ".(function_exists('shell_exec') ? 'SIM' : 'NAO')."\n";

if(!$python){
    echo "\nERRO: Python nao encontrado pelo Apache.\n";
    echo "Execute 'where.exe python' no PowerShell e coloque o caminho em backend/config/ocr.php\n";
    exit;
}

$script=realpath(__DIR__.'/../ocr/ocr_bib.py');
echo "Script: ".($script ?: 'NAO ENCONTRADO')."\n";

/*
 * No Windows, aspas simples dentro do código Python são mais seguras
 * porque o CMD usa aspas duplas para delimitar todo o argumento -c.
 */
$pythonCode = "import sys, cv2, pytesseract; "
            . "print(sys.executable); "
            . "print('cv2 OK'); "
            . "print('pytesseract OK'); "
            . "print(pytesseract.get_tesseract_version())";

$cmd = '"'.str_replace('"','\"',$python).'" -c "'
     . str_replace('"','\"',$pythonCode)
     . '" 2>&1';

echo "\nComando:\n".$cmd."\n\n";
echo "Resultado:\n";

$result=@shell_exec($cmd);

if($result === null){
    echo "ERRO: shell_exec retornou NULL.\n";
    echo "Verifique disable_functions no php.ini.\n";
}else{
    echo $result;
}

echo "\n\n--- TESTE DO SCRIPT OCR ---\n";
echo "Para testar uma foto real use:\n";
echo "\"{$python}\" \"{$script}\" \"C:\\xampp\\htdocs\\CorreFoto\\backend\\uploads\\SUA_FOTO.webp\"\n";

echo "\nLog: backend/logs/ocr.log\n";
