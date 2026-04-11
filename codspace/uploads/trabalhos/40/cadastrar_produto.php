<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo2.css">
    <title>Cadastro de Produtos</title>
    <style>
        * {
            padding:0;
            margin:0;
        }
        form {
            width: 350px;
        }
        body {          
            background: linear-gradient(to top, rgba(255,228,225), rgba(255,250,205), rgba(240,255,240), rgba(240,255,255), rgba(230,230,250));
            font-family: Verdana;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        input,select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 5px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .cabecalho  {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;  
            width: 1000px; 
        }
        .cel_cabecalho {
            width: 180px;
            margin: 5px; 
        }
        .linha {
            display: flex;
            border: solid 1px black;
            padding: 5px 10px;
        }
        .resultado {
            margin-top: 20px;
        }
        .form-box {
            background-color: rgba(255, 255, 255, 0.83); 
            border: 2px solid rgba(0, 0, 0, 1); 
            border-radius: 10px; 
            padding: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgb(255,192,203);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
            margin-left: 5px;
        }
        button:hover {
            background-color: rgb(255,182,193);
        }

       
    </style>
</head>
<body>
    <section>
        <div class="container">
            <div class="form-box">
                <form action="gravar_produto.php" method="post">
                    <label for="produto">Produto</label>
                    <input type="text" name="produto" id="produto" placeholder="Nome do produto" required>

                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade" id="quantidade" min="1" placeholder="Quantidade" required>

                    <label for="valor">Valor</label>
                    <input type="number" name="valor" id="valor" step="0.01" placeholder="Valor em R$" required>
                   
                    <button type="submit">Salvar</button>
                </form>
            </div>
        </div>
    </section>

    <section class="resultados">
        <div class="resultado">
            <?php 
            include "conexao.php";

            $sql = "SELECT * FROM produtos";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Produto</div>";
                echo "<div class='cel_cabecalho'>Quantidade</div>";
                echo "<div class='cel_cabecalho'>Valor</div>";
                echo "<div class='cel_cabecalho'>Ações</div>";
                echo "</div>";

                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                    echo "<div class='cel_cabecalho'> " . number_format($linha['valor']) . "</div>";

                    echo "<div class='cel_cabecalho'>";
                    echo "<form action='editar_produto.php' method='get' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Editar</button>";
                    echo "</form>";

                    echo "<form action='deletar_produto.php' method='post' style='display:inline;' onsubmit=\"return confirm('Deseja realmente deletar este produto?');\">";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Deletar</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>Não há registros.</p>";
            }
            ?>
        </div>
    </section>
</body>
</html>
