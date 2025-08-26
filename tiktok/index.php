<?php
$root = realpath(__DIR__ . '/../tiktok'); // pasta raiz

// Pega o caminho relativo via URL
$path = isset($_GET['path']) ? $_GET['path'] : '';
$currentDir = realpath($root . '/' . $path);

// Segurança: garante que não saia da pasta raiz
if (!$currentDir || strpos($currentDir, $root) !== 0) {
    $currentDir = $root;
}

// Lista arquivos e pastas
function listarArquivos($dir) {
    $items = scandir($dir);
    $result = [];
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        $result[] = [
            'name' => $item,
            'isDir' => is_dir($dir . '/' . $item)
        ];
    }
    return $result;
}

$arquivos = listarArquivos($currentDir);

// Caminho relativo para links
$relativePath = str_replace($root, '', $currentDir);
$relativePath = ltrim($relativePath, '/');
$parentPath = dirname($relativePath);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Meus Projetos</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f5f5f5; }
        h1 { text-align: center; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; }
        .item { background: white; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; }
        .folder { font-weight: bold; color: #2a7ae2; text-decoration: none; display: block; }
        .file { color: #333; text-decoration: none; display: block; }
        .back { margin-bottom: 20px; display: inline-block; color: #ff5722; text-decoration: none; }
    </style>
</head>
<body>
    <h1>Meus Projetos</h1>

    <?php if ($currentDir != $root): ?>
        <a class="back" href="?path=<?= urlencode($parentPath === '.' ? '' : $parentPath) ?>">&larr; Voltar</a>
    <?php endif; ?>

    <div class="grid">
        <?php foreach ($arquivos as $item): ?>
            <?php if ($item['isDir']): ?>
                <a class="item folder" href="?path=<?= urlencode($relativePath === '' ? $item['name'] : $relativePath . '/' . $item['name']) ?>">
                    <?= htmlspecialchars($item['name']) ?>
                </a>
            <?php else: ?>
                <?php
                    $fileExt = pathinfo($item['name'], PATHINFO_EXTENSION);
                    $filePath = ($relativePath === '' ? $item['name'] : $relativePath . '/' . $item['name']);
                ?>
                <?php if (strtolower($fileExt) === 'html'): ?>
                    <a class="item file" href=".<?= $filePath ?>" target="_blank">
                        <?= htmlspecialchars($item['name']) ?>
                    </a>
                <?php else: ?>
                    <div class="item file"><?= htmlspecialchars($item['name']) ?></div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</body>
</html>
