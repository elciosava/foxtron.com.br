 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produto</title>
    <link rel="stylesheet" href="style.css">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }
        form{
            width: 500px;
        }
        input, select{
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
            box-sizing: border-box;
        }
        .cabecalho{
            display: flex;
            padding: 0 20px;
            border: 1px solid black;
            width: 1000px;
        }
        .cel_cabecalho{
            width: 250px;
        }        
        .top {
            
            margin-top: 40px;
        }
    </style>
 </head>
 <body>
    <section>
        <div class="container">
            <form action="gravar_produto.php" method="post">
                <label for="produto">produto</label>
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
            include 'conexao.php';
                $sql = "SELECT * FROM  produto";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                if($stmt->rowCount()>0){
                    echo "<div class='cabecalho top'>ID";
                        echo "<div class='cel_cabecalho'>ID</div>";
                        echo "<div class='cel_cabecalho'>produto</div>";
                        echo "<div class='cel_cabecalho'>quantidade</div>";
                        echo "<div class='cel_cabecalho'>valor</div>";
                        echo "<div class='cel_cabecalho'>ações</div>";

                    echo "</div>";

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='cabecalho'>ID";
                        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";
                        echo "<div class='cel_cabecalho'><button>editar</button><button>deletar</button></div>";
                    echo "</div>";
                }
                }else{
                    echo "<p>não tem registro</p>";
                }
            ?>
        </div>

    </section>
 </body>
 </html>