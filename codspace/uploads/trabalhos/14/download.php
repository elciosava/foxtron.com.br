<?php
$pasta = __DIR__; // mesma pasta do script

if (isset($_GET['file'])) {
    $arquivo = basename($_GET['file']); // impede caminho malicioso
    $caminho = $pasta . DIRECTORY_SEPARATOR . $arquivo;

    if (file_exists($caminho)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($caminho) . '"');
        header('Content-Length: ' . filesize($caminho));
        readfile($caminho);
        exit;
    } else {
        echo "Arquivo não encontrado.";
    }
} else {
    echo "Nenhum arquivo especificado.";
}