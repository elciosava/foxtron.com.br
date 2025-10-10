<?php
$baseDir = __DIR__ . '/trabalhos';

$file = basename($_GET['file'] ?? '');


$path = $baseDir . $file;

if(!file_exists($path)){
    die('arquivo não encontrado.');
}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename"' .$file . '"');
?>