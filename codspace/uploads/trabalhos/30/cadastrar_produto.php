

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         * {
            padding:0;
            margin:0;
        }
        form {
            width: 350px;
        }
        body {
            background: rgba(0, 255, 251, 1);
            font-family: Verdana;
            flex-direction: column;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        input,select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 2px;
            
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 300px;
            
        }

        .cabecalho {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;
            width: 1000px;
        }
        .cel_cabecalho{
            width: 250px;
        }


       
        
    </style>
</head>
<body>
    <section class="endereco">
        <div class="container">
            
        <form action="gravar_produto.php" method="post">
                      
                    <label for="produto">Produto</label>
                    <input type="text" name="produto" id="">                   

                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade" id="">

                      <label for="valor">Valor</label>
                    <input type="number" name="valor" id="">
                      
                    <button type="submit">Salvar</button>
                </form>
                
        </div>
    </section>
    <section class="resultados">
        <div class="resultados">
            <?php
                include "conexao.php";

                $sql = "SELECT * FROM produto";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                if($stmt->rowCount()>0){
                echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>ID</div>";
                    echo "<div class='cel_cabecalho'>produto</div>";
                    echo "<div class='cel_cabecalho'>quantidade</div>";
                    echo "<div class='cel_cabecalho'>valor</div>";
                    echo "<div class='cel_cabecalho'>Ações</div>";
                echo"</div>";

                

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";
                    echo "<div class='cel_cabecalho'><button>editar</button><button>deletar</button></div>";
                echo"</div>";
                }
                }else{
                    echo "<p>nao tem registro</p>";
                }
            ?>
        </div>
    </section>
</body>
</html>