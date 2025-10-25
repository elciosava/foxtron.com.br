<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'] ?? null;
    $quantidade = $_POST['quantidade'] ?? null;
    $valor = $_POST['valor'] ?? null;
    $id = $_GET['id'];

    if (!empty($id) && !empty($nome) && !empty($quantidade) && !empty($valor)) {
        try {
            $sql = "UPDATE produto SET nome = :nome, quantidade = :quantidade, valor = :valor WHERE id = :id";
            $stmt = $conexao->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":quantidade", $quantidade);
            $stmt->bindParam(":valor", $valor);
            $stmt->execute();
        } catch (PDOException $e) {
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="estilo2.css" />
    <title>Atualizar Produto</title>
    <style>
        .cabecalho {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;
            font-size: 0.75rem;
            width: 1000px;
        }

        .cel_cabecalho {
            width: 250px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <section>
        <div class="container">
            <form action="" method="post">
                <input type="text" value="<?php echo $_GET['$id']; ?>" id="id" name="id">

                <label for="id">ID do Produto</label>
                <input type="number" name="id" id="id" required />

                <label for="nome">Produto</label>
                <input type="text" name="nome" id="nome" required />

                <label for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" required />

                <label for="valor">Valor</label>
                <input type="text" name="valor" id="valor" required />

                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
</body>

</html>