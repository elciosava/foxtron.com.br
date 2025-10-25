<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo2.css">
    <title>Document</title>
    <style>
        .cabecalho {
            display: flex;
            padding:0 20px;
            font-size: 0.75rem;
            width: 1000px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 20px;
            background: rgb(112, 112, 112);
            height: 50px;
            color: white;
        }

        .cel_cabecalho {
          width: 250px;
            border: 1px solid black;
        }
        .linha{
            display: flex;
            border: solid 1px black;
            padding: 5px 10px;
        }
        
    </style>
</head>

<body>
    <section>
        <div class="container">
           
            <form action="cadastrar_produto.php" method="post">
                <label for="produto">produto</label>
                <input type="text" name="produto" id="produto">   

                <label for="quantidade">quantidade</label>
                <input type="number" name="quantidade" id="quantidade">

                <label for="valor">valor</label>
                <input type="text" name="valor" id="valor">

                <button type="submit">salvar</button>
            </form>

        </div>
        </div>
    </section>
    <section class="resultados">
        <div class="resultado">
            <?php
            include "conexao.php";

            $sql = "SELECT * FROM produto";
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
                    echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";

                    //ações (editar + deletar)
                    echo "<div class='cel_cabecalho'>";

                    //formulario editar
                    echo "<form action='editar_produto.php' method='get' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>editar</button>";
                    echo "</form>";

                    //formulario deletar
                    echo "<form action='deletar_produto.php' method='post' style='display:inline' onsubmit=\"return confirm(deseja realmente deletar este produto?');\">";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>deletar</button>";

                    echo "</div>";//fecha celula ações

                    echo "<form action='editar_produto.php' method='get'>";
                    "<input type='hidden' name='{$linha['id']}'>";

                    echo "<div class='cel_cabecalho'><button type='submit'>Editar</button> <button>excluir</button></div>";

                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<p>nao tem registro</p>";
            }


            ?>
    </section>
</body>

</html>