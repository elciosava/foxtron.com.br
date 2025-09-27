<?php
    ini_set('display_errors', 0);

    $produto = isset($_POST['produto']) ? $_POST['produto'] : '';
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    $preferencias = isset($_POST['preferencias']) ? $_POST['preferencias'] : [];
    $entrega = isset($_POST['entrega']) ? $_POST['entrega'] : '';
    $data = isset($_POST['data']) ? $_POST['data'] : '';
    $cor = isset($_POST['cor']) ? $_POST['cor'] : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mercadinho Simples</title>
</head>
<body>
    <h2>Mercadinho da Vila</h2>
    <form method="post">
        <label for="produto">Nome do Produto</label>
        <input type="text" name="produto" id="produto">

        <p>Categoria:</p>
        <input type="radio" name="categoria" value="Fruta"> Fruta
        <input type="radio" name="categoria" value="Legume"> Legume

        <p>Preferências:</p>
        <input type="checkbox" name="preferencias[]" value="Orgânico"> Orgânico
        <input type="checkbox" name="preferencias[]" value="Importado"> Importado

        <label for="entrega">Modo de Entrega</label>
        <select name="entrega" id="entrega">
            <option value="Retirar na loja">Retirar na loja</option>
            <option value="Entrega em casa">Entrega em casa</option>
        </select>

        <label for="data">Data de Entrega</label>
        <input type="date" name="data" id="data">

        <label for="cor">Cor da Embalagem</label>
        <input type="color" name="cor" id="cor">

        <button type="submit">Enviar Pedido</button>
    </form>

    <h3>📦 Seu Pedido:</h3>
    <div>
        <?php
            echo "<p><strong>Produto:</strong> " . htmlspecialchars($produto) . "</p>";
            echo "<p><strong>Categoria:</strong> " . htmlspecialchars($categoria) . "</p>";
            echo "<p><strong>Preferências:</strong> " . implode(", ", $preferencias) . "</p>";
            echo "<p><strong>Entrega:</strong> " . htmlspecialchars($entrega) . "</p>";
            echo "<p><strong>Data:</strong> " . htmlspecialchars($data) . "</p>";
            echo "<p><strong>Cor da Embalagem:</strong> " . htmlspecialchars($cor) . "</p>";
        ?>
    </div>
</body>
</html>

