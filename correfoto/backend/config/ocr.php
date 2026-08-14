<?php
/*
 * OCR - configuração estável para Windows/XAMPP.
 *
 * Preferência:
 * 1) variável de ambiente OCR_PYTHON;
 * 2) caminho explícito abaixo;
 * 3) descoberta automática.
 *
 * No servidor que já funcionou, você pode manter:
 * $OCR_PYTHON = 'C:\\Users\\elcio\\AppData\\Local\\Python\\bin\\python.exe';
 */
$OCR_PYTHON = getenv('OCR_PYTHON') ?: 'C:\\Users\\elcio\\AppData\\Local\\Python\\bin\\python.exe';
$OCR_TESSERACT = getenv('OCR_TESSERACT') ?: 'C:\\Program Files\\Tesseract-OCR\\tesseract.exe';

function ocr_log(string $message): void {
    $dir = __DIR__.'/../logs';
    if (!is_dir($dir)) @mkdir($dir,0777,true);
    @file_put_contents(
        $dir.'/ocr.log',
        '['.date('Y-m-d H:i:s').'] '.$message.PHP_EOL,
        FILE_APPEND
    );
}

function find_python_exe(): ?string {
    global $OCR_PYTHON;

    if ($OCR_PYTHON !== '' && is_file($OCR_PYTHON)) return $OCR_PYTHON;

    $candidates = [];
    $local = getenv('LOCALAPPDATA');
    $user = getenv('USERPROFILE');

    if ($local) {
        $candidates[] = $local.'\\Python\\bin\\python.exe';
        foreach (['314','313','312','311','310','39'] as $v) {
            $candidates[] = $local."\\Programs\\Python\\Python{$v}\\python.exe";
        }
    }

    if ($user) {
        $candidates[] = $user.'\\AppData\\Local\\Python\\bin\\python.exe';
        foreach (['314','313','312','311','310','39'] as $v) {
            $candidates[] = $user."\\AppData\\Local\\Programs\\Python\\Python{$v}\\python.exe";
        }
    }

    foreach (['314','313','312','311','310'] as $v) {
        $candidates[] = "C:\\Python{$v}\\python.exe";
    }

    foreach ($candidates as $p) if (is_file($p)) return $p;

    $where = @shell_exec('where python 2>NUL');
    if (is_string($where) && trim($where) !== '') {
        foreach (preg_split('/\\r?\\n/',trim($where)) as $p) {
            $p=trim($p);
            if ($p !== '' && is_file($p) && stripos($p,'WindowsApps')===false) return $p;
        }
    }
    return null;
}
