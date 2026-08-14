<?php
header('Content-Type: text/plain; charset=utf-8');

echo "PHP FUNCIONANDO\n";
echo "Versao: ".PHP_VERSION."\n";
echo "Sistema: ".PHP_OS."\n";
echo "shell_exec: ".(function_exists('shell_exec') ? 'SIM' : 'NAO')."\n";
echo "exec: ".(function_exists('exec') ? 'SIM' : 'NAO')."\n";
echo "proc_open: ".(function_exists('proc_open') ? 'SIM' : 'NAO')."\n";
echo "disable_functions: ".ini_get('disable_functions')."\n";
echo "PATH: ".getenv('PATH')."\n";
