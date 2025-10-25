<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['produto']; // Corrigido: campo do formulário
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];

    if (!empty($id) && !empty($nome) && !empty($quantidade) && !empty($valor)) {
        try {
            $sql = "UPDATE produtos 
                    SET nome = :nome, quantidade = :quantidade, valor = :valor 
                    WHERE id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            echo "✅ Produto atualizado com sucesso!";
        } catch (PDOException $erro) {
            echo "❌ Erro ao atualizar: " . $erro->getMessage();
        }
    } else {
        echo "⚠️ Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        form {
            width: 350px;
        }
        body {
            background: rgba(0, 191, 255, 1);
            font-family: Verdana;
            flex-direction: column;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        input, select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 6px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <section class="endereco">
        <div class="container">
            <form action="" method="post">
                <label for="id">ID</label>
                <input type="text" value="<?php echo htmlspecialchars($_GET['id'] ?? '', ENT_QUOTES); ?>" id="id" name="id" readonly>

                <label for="produto">Produto</label>
                <input type="text" name="produto" id="produto" required>

                <label for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" required>          

                <label for="valor">Valor</label>
                <input type="number" step="0.01" name="valor" id="valor" required>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
</body>
</html>
