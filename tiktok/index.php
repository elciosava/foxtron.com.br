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
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@400;600&family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Exo', sans-serif;
            background: #0f0f1f;
            color: #fff;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #ff0048;
            margin-bottom: 40px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            max-width: 1100px;
            margin: auto;
        }
        .card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease;
            cursor: pointer;
            text-align: center;
            padding: 20px;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h3 {
            margin-top: 15px;
            font-size: 1.1rem;
            color: #ff0048;
        }
        .card p {
            font-size: 0.9rem;
            color: #ddd;
        }
        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #ff0048;
            text-decoration: none;
            font-weight: bold;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <h1>Meus Projetos</h1>

    <?php if ($currentDir != $root): ?>
        <a class="back" href="?path=<?= urlencode($parentPath === '.' ? '' : $parentPath) ?>">&larr; Voltar</a>
    <?php endif; ?>

    <div class="grid">
        <?php foreach ($arquivos as $item): ?>
            <?php
                $fileExt = pathinfo($item['name'], PATHINFO_EXTENSION);
                $filePath = ($relativePath === '' ? $item['name'] : $relativePath . '/' . $item['name']);
            ?>
            <?php if ($item['isDir']): ?>
                <a href="?path=<?= urlencode($relativePath === '' ? $item['name'] : $relativePath . '/' . $item['name']) ?>">
                    <div class="card">
                        <h3>📁 <?= htmlspecialchars($item['name']) ?></h3>
                        <p>Pasta de projetos</p>
                    </div>
                </a>
            <?php else: ?>
                <?php if (strtolower($fileExt) === 'html'): ?>
                    <a href=".<?= $filePath ?>" target="_blank">
                        <div class="card">
                            <h3>📄 <?= htmlspecialchars($item['name']) ?></h3>
                            <p>Abrir no navegador</p>
                        </div>
                    </a>
                <?php else: ?>
                    <div class="card">
                        <h3>📄 <?= htmlspecialchars($item['name']) ?></h3>
                        <p>Arquivo</p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</body>
</html>
