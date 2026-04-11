<?php
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto = trim($_POST['produto']);

    if (empty($produto)) {
        echo "<p style='color:red;'>Preencha o campo Produto!</p>";
    } else {
        $sql = "INSERT INTO pecas (produto) VALUES (:produto)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':produto', $produto);

        if ($stmt->execute()) {
            header("Location: pecas.php");
            exit;
        } else {
            echo "<p style='color:red;'>Erro ao cadastrar o produto.</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Peças</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {          
            background: linear-gradient(to top, #171718ff, red);
            font-family: Verdana;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h2 {
            text-align: center;
            color: #000;
            padding-bottom: 20px;
            font-size: 1.8rem;
        }

        form {
            width: 350px;
            display: flex;
            flex-direction: column;
        }

        input, select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 8px;
        }

        button {
            background-color: black;
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #65696e;
        }

        .form-box {
            background-color: rgba(255, 255, 255, 0.83); 
            border: 2px solid black; 
            border-radius: 10px; 
            padding: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }

        .tabela {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 15px;
            border-radius: 10px;
            width: 800px;
            margin-top: 20px;
            border: 1px solid black;
        }

        .cabecalho, .linha {
            display: flex;
            border-bottom: 1px solid black;
            padding: 5px;
        }

        .cel_cabecalho {
            width: 200px;
            text-align: center;
        }

        .linha:nth-child(even) {
            background-color: #f0f0f0;
        }

        .acoes form {
            display: inline;
        }
    </style>
</head>
<body>

    <div class="form-box">
        <h2>Cadastrar Peças</h2>
        <form action="" method="post">
            <label for="produto">Produto</label>
            <input type="text" name="produto" id="produto" required>
            <button type="submit">Salvar</button>
        </form>
    </div>

    <div class="tabela">
        <?php
        include "conexao.php";
        $sql = "SELECT * FROM pecas ORDER BY id DESC";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<div class='cabecalho'>
                    <div class='cel_cabecalho'><strong>ID</strong></div>
                    <div class='cel_cabecalho'><strong>Produto</strong></div>
                    <div class='cel_cabecalho'><strong>Ações</strong></div>
                  </div>";

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='linha'>
                        <div class='cel_cabecalho'>{$linha['id']}</div>
                        <div class='cel_cabecalho'>{$linha['produto']}</div>
                        <div class='cel_cabecalho acoes'>
                            <form action='entrada.php' method='get'>
                                <input type='hidden' name='id' value='{$linha['id']}'>
                                <button type='submit'>Entrada</button>
                            </form>
                            <form action='deletar_produto.php' method='post' onsubmit=\"return confirm('Tem certeza que deseja deletar este produto?');\">
                                <input type='hidden' name='id' value='{$linha['id']}'>
                                <button type='submit'>saida</button>
                            </form>
                        </div>
                      </div>";
            }
        } else {
            echo "<p style='text-align:center;'>Nenhum produto cadastrado ainda.</p>";
        }
        ?>
    </div> 
</body>
</html>
