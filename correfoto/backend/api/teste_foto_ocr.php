<?php

header('Content-Type: text/plain; charset=utf-8');
set_time_limit(120);

$python = 'C:\\Python314\\python.exe';

$script = realpath(__DIR__ . '/../ocr/ocr_bib.py');

$foto = realpath(
    __DIR__ . '/../uploads/cae2425746aa2a02d97524d3bcd2938f.webp'
);

echo "PYTHON:\n$python\n\n";
echo "SCRIPT:\n$script\n\n";
echo "FOTO:\n$foto\n\n";

$comando =
    '"' . $python . '" ' .
    '"' . $script . '" ' .
    '"' . $foto . '" 2>&1';

echo "COMANDO:\n$comando\n\n";

echo "RESULTADO:\n";

$resultado = shell_exec($comando);

var_dump($resultado);