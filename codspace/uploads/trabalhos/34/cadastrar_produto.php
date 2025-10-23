

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
        form {
            width: 300px;
        }

        input, select{
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
            box-sizing: border-box;
        }

        .cabecalho{
            display:flex;
            padding: 0 20px;
            border: 1px solid black;
            width: 1000px;
        }
        .cel_cabecalho {
            width: 250px;
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <form action="gravar_produto.php" method="post">
                <label for="produto">Produto</label>
                <input type="text" name="produto" id="">

                <label for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" id="">

                <label for="valor">valor</label>
                <input type="number" name="valor" id="">

                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
    <section class="resultados">
        <div class="resultado">
            <?php
                include "conexao.php";

                $sql = "SELECT * FROM produtos";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                if($stmt->rowCount()>0){
                    echo "<div class='cabecalho'>";
                        echo "<div class='cel_cabecalho'>ID</div>";
                        echo "<div class='cel_cabecalho'>Produto</div>";
                        echo "<div class='cel_cabecalho'>Quantidade</div>";
                        echo "<div class='cel_cabecalho'>Valor</div>";
                        echo "<div class='cel_cabecalho'>Ações</div>";
                    echo "</div>";
                        
                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='cabecalho'>";
                        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";
                        echo "<form action='editar_produto.php' method='get'>
                             <input type='hidden' name='id' value='{$linha['id']}'>";

                        echo "<div class='cel_cabecalho'><button type='submit'>Editar</button><button>Deletar</button></div>";

                        echo "</form>";
                    echo "</div>";
                }
                }else{
                    echo "<p>nao tem registro</p>";
                }
            ?>
        </div>
    </section>
</body>
</html>