<?php
ini_set('display_errors', value: 0); 


$categoria = $_POST['categoria'] ?? '';
$promocao = isset($_POST['promocao']) ? 'Sim' : 'Não';
$validade = $_POST['validade'] ?? '';
$cor_etiqueta = $_POST['cor_etiqueta'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mercadinho</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .container {
            width: 400px;
        }
        form {
            border: 1px solid #ccc;
            padding: 20px;
            background: #f5f5f5;
            border-radius: 8px;
        }
        label {
            display: block;
            margin-top: 15px;
        }
        .resultados {
            margin-top: 30px;
            background: #e0ffe0;
            padding: 15px;
            border-radius: 8px;
        }
        .cor-box {
            width: 30px;
            height: 20px;
            display: inline-block;
            border: 1px solid #000;
        }
    </style>
</head>
<body>

    <h2> Cadastro de Produto - Mercadinho</h2>

    <div class="container">
        <form method="post">
            <label for="produto">Nome do Produto:</label>
            <input type="text" name="produto" id="produto" required>

            <label>Categoria:</label>
            <input type="radio" name="categoria" value="Alimento" required> Alimento
            <input type="radio" name="categoria" value="Bebida"> Bebida
            <input type="radio" name="categoria" value="Limpeza"> Limpeza

            <label>
                <input type="checkbox" name="promocao"> Em promoção
            </label>

            <label for="validade">Data de Validade:</label>
            <input type="date" name="validade" id="validade">

            <label for="cor_etiqueta">Cor da Etiqueta:</label>
            <input type="color" name="cor_etiqueta" id="cor_etiqueta">

            <button type="submit">Cadastrar Produto</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
            <div class="resultados">
                <h3>✅ Produto Cadastrado:</h3>
                <p><strong>Produto:</strong> <?= htmlspecialchars($produto) ?></p>
                <p><strong>Categoria:</strong> <?= htmlspecialchars($categoria) ?></p>
                <p><strong>Em promoção:</strong> <?= $promocao ?></p>
                <p><strong>Validade:</strong> <?= htmlspecialchars($validade) ?></p>
                <p><strong>Cor da etiqueta:</strong> <?= htmlspecialchars($cor_etiqueta) ?>
                    <span class="cor-box" style="background: <?= htmlspecialchars($cor_etiqueta) ?>;"></span>
                </p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>
