<?php
    $baseDir = __DIR__ . '/';

    $user = basename($_GET['user'] ?? '');
    $file = basename($_GET['file'] ?? '');


    $path = $baseDir . $user . '/' . $file;

    echo "Caminho do arquivo: " . $path;
    exit;

    if(!file_exists($path)){
        die('Arquivo não encontrado.');
    }

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' .$file . '"');
    header('Content-Length: ' . filesize($path));
    flush();
    readfile($path);
    exit;
?>