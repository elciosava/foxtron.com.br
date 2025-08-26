<?php
$root = __DIR__ . '/meus-projetos'; // substitua pelo caminho da sua pasta raiz

function listarArquivos($dir) {
    $items = scandir($dir);
    $result = [];
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        $fullPath = $dir . '/' . $item;
        $result[] = [
            'name' => $item,
            'isDir' => is_dir($fullPath)
        ];
    }
    return $result;
}

$arquivos = listarArquivos($root);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Meus Projetos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f5f5f5;
        }
        h1 {
            text-align: center;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }
        .item {
            background: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .folder {
            font-weight: bold;
            color: #2a7ae2;
        }
        .file {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Meus Projetos</h1>
    <div class="grid">
        <?php foreach ($arquivos as $item): ?>
            <div class="item <?= $item['isDir'] ? 'folder' : 'file' ?>">
                <?= htmlspecialchars($item['name']) ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
