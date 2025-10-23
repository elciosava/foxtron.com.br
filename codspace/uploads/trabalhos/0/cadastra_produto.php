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
            border: 1px solid black;
            font-size: 0.75rem;
            width: 1000PX;
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
    

            <label for="produto">produto</label>
            <input type="text" name="produto" id="">   
            
            <label for="quantidade">quantidade</label>
            <input type="number" name="quantidade" id="">


            <label for="valor">valor</label>
            <input type="text" name="valor" id="">


                <button type="submit">salvar</button>

            
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

                    echo"<form action='editar_produto.php' method='get'>
                    <input type='hidden' name='id' value='{$linha['id']}'>";
                    
                    echo "<div class='cel_cabecalho'><button>editar</button> <button>excluir</button></div>";

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