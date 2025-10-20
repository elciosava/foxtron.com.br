<?php
// Pasta que você quer listar (use __DIR__ para a pasta atual)
$pasta = __DIR__;

// Lê todos os arquivos da pasta
$arquivos = scandir($pasta);

// Remove "." e ".."
$arquivos = array_diff($arquivos, ['.', '..']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meus Arquivos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a2041;
            color: white;
            padding: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #252b4e;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #3b4170;
            text-align: left;
        }
        th {
            background: #323a63;
        }
        a {
            color: #00d1ff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .baixar {
            background: #00d1ff;
            color: #000;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }
        .baixar:hover {
            background: #00aee0;
        }
    </style>
</head>
<body>
    <h1>📁 Lista de Arquivos</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Tamanho</th>
            <th>Ação</th>
        </tr>
        <?php foreach ($arquivos as $arquivo): ?>
            <?php if (is_file("$pasta/$arquivo")): ?>
                <tr>
                    <td><?= htmlspecialchars($arquivo) ?></td>
                    <td><?= round(filesize("$pasta/$arquivo") / 1024, 2) ?> KB</td>
                    <td><a class="baixar" href="download.php?file=<?= urlencode($arquivo) ?>">Baixar</a></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>

