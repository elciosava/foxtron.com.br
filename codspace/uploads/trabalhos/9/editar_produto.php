<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'] ?? null;
    $quantidade = $_POST['quantidade'] ?? null;
    $valor = $_POST['valor'] ?? null;

    if (!empty($id) && !empty($nome) && !empty($quantidade) && !empty($valor)) {
        try {
            $sql = "UPDATE produto 
                    SET nome = :nome, quantidade = :quantidade, valor = :valor 
                    WHERE id = :id";
            $stmt = $conexao->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":quantidade", $quantidade);
            $stmt->bindParam(":valor", $valor);
            $stmt->execute();

            echo "<script>alert('Produto atualizado com sucesso!'); window.location.href='cadastra_produto.php';</script>";
            exit;
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao atualizar o produto!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Produto</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

/* BODY COM FUNDO ANIMADO */
body {
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    color: #fff;

    /* Fundo animado */
    background: linear-gradient(135deg, #ff0000, #00ff00, #0000ff, #ffcc00, #ff00ff);
    background-size: 600% 600%;
    animation: gradientAnimation 20s ease infinite;
}

@keyframes gradientAnimation {
    0% { background-position: 0% 50%; }
    25% { background-position: 50% 100%; }
    50% { background-position: 100% 50%; }
    75% { background-position: 50% 0%; }
    100% { background-position: 0% 50%; }
}

/* TITULO */
h1 {
    margin-top: 40px;
    font-size: 2rem;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #ffcc00;
    text-shadow: 2px 2px 10px rgba(255, 204, 0, 0.6);
}

/* FORMULÁRIO */
form {
    background-color: rgba(0, 0, 0, 0.85);
    border: 2px solid #ffcc00;
    border-radius: 10px;
    padding: 20px;
    width: 320px;
    box-shadow: 0 0 15px rgba(255, 0, 0, 0.7);
    margin-top: 20px;
}

form label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
    color: #ffcc00;
}

input {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ffcc00;
    border-radius: 5px;
    background-color: #1a1a1a;
    color: #fff;
}

input:focus {
    outline: none;
    border-color: #ff0000;
    box-shadow: 0 0 10px #ff0000;
}

button {
    margin-top: 15px;
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background: linear-gradient(90deg, #ff0000, #b30000);
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: linear-gradient(90deg, #ffcc00, #ff0000);
    box-shadow: 0 0 15px #ffcc00;
    color: #000;
}

/* RESULTADOS / TABELA */
.resultados {
    margin-top: 40px;
    width: 90%;
    max-width: 800px;
    background-color: rgba(0, 0, 0, 0.85);
    border-radius: 10px;
    padding: 15px;
    border: 2px solid #ffcc00;
    box-shadow: 0 0 20px rgba(255, 0, 0, 0.6);

    /* SCROLL VERTICAL */
    max-height: 400px;
    overflow-y: auto;
}

/* CABEÇALHO E LINHAS */
.cabecalho, .linha {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #ffcc00;
}

.cabecalho {
    background: rgba(255, 0, 0, 0.2);
    font-weight: bold;
    color: #ffcc00;
    position: sticky;
    top: 0;
    z-index: 5;
}

.cel_cabecalho {
    flex: 1;
    text-align: center;
}

.linha {
    display: flex;
    border: solid 1px black;
    padding: 5px 10px;
}

.linha:nth-child(even) {
    background-color: rgba(255, 255, 255, 0.05);
}

/* AÇÕES */
.acoes {
    display: flex;
    gap: 10px;
    justify-content: center;
}

.acoes form {
    display: inline;
    margin: 0;
    padding: 0;
    border: none;
    background: none;
}

.acoes button {
    width: 100px;
    padding: 10px 0;
    border-radius: 10px;
    font-size: 0.8rem;
    margin: 0;
    text-align: center;
    transition: 0.3s;
}

.acoes button:hover {
    background: #ffcc00;
    color: #000;
}

/* RESPONSIVO */
@media (max-width: 768px) {
    form {
        width: 90%;
        padding: 15px;
    }

    .cel_cabecalho, .linha {
        font-size: 0.85rem;
    }

    .acoes button {
        width: 80px;
        padding: 8px 0;
        font-size: 0.75rem;
    }
}
    </style>
</head>

<body>
    <section>
        <div class="container">
            <h2>Atualizar Produto</h2>

            <form action="" method="post">
                <label for="id">ID do Produto</label>
                <input type="number" name="id" id="id" 
                       value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>" required readonly>

                <label for="nome">Produto</label>
                <input type="text" name="nome" id="nome" required>

                <label for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" required>

                <label for="valor">Valor</label>
                <input type="text" name="valor" id="valor" required>

                <button type="submit">Salvar</button>
                <a href="cadastra_produto.php" class="btn-voltar">Voltar</a>
            </form>
        </div>
    </section>
</body>
</html>
