<?php
$diretorio = __DIR__;
$arquivos = scandir($diretorio);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 15px;
        }

        .item {
            background-color: white;
            padding: 15px;
            border-radius: 10px;
            text-decoration: none;
            color: #333;
            display: flex;
            gap: 10px;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }

        .item:hover {
            transform: scale(1.03);
        }
    </style>
</head>
<body>
    <h1>📁 Arquivos da pasta</h1>

    <div class="container">
        <?php foreach ($arquivos as $arquivo): ?>
            <?php
                if ($arquivo === '.' || $arquivo === '..' || $arquivo === 'index.php')
                    continue;
                $caminho = $diretorio . '/' . $arquivo
            ?>

            <a class="item" href="<?= $arquivo ?>">
                <?= is_dir($caminho) ? "🗂️" : "🗄️" ?>
                <span><?= $arquivo ?></span>
            </a>

            <?php endforeach; ?>
    </div>
</body>
</html>