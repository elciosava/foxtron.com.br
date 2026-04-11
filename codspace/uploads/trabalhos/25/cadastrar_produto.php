<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo2.css">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        .cabecalho {
            display: flex;
            padding: 5px 10px;
            border: 1px solid black;
            font-size: 0.75rem;
            width: 1000px;
        }

        .cel_cabecalho {
          width: 200px;
        }
        input{
            width: 100%;
            margin-bottom: 10px;
        }

        .linha {
            display:flex;
            border: solid 1px black;
            padding: 5px 10px;
            width: 1000px;
        }
        form {
            width: 400px;
        }
        
        .resultado{
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <section>
        <div class="container">
            <form action="gravar_produto.php" method="post">
                <label for="produto">produto</label>
            <input type="text" name="produto" id="">   
            
            <label for="quantidade">quantidade</label>
            <input type="number" name="quantidade" id="">


            <label for="valor">valor</label>
            <input type="text" name="valor" id="">


                <button type="submit">salvar</button>

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
                echo "<div class='cel_cabecalho'>id</div>";
                echo "<div class='cel_cabecalho'>produto</div>";
                echo "<div class='cel_cabecalho'>quantidade</div>";
                echo "<div class='cel_cabecalho'>valor</div>";
                echo "<div class='cel_cabecalho'>Ações</div>";
                echo "</div>";


                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";

                    echo "<div class='cel_cabecalho'>";

                    echo "<form action='editar_produto.php' method='get' style='display:incline;'>";
                    echo "<input type='hidden' name='id'value='{$linha['id']}'>";
                    echo "<button type='submit'>Editar</button>";
                    echo "</form>";

                    echo "<form action='deletar_produto.php' method='post' style='display:inline;
                    'onsubmit=\"return confirm('Deseja realmente deletar este produto?');\">";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Deletar</button>";
                    echo "</form>";

                    echo "</div>";

                    echo "</div>";
                }
            }else {
                echo "<p>Não há registros.</p>";
            }
            ?>
            </div>

    </section>
</body>

</html>