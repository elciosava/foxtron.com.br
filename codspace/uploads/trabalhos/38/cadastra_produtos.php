<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        body {
            justify-content: center;
            background:linear-gradient(to right, #808080,#141414);
        }
         .container {
            display: grid;
            grid-template-columns: 1fr 4fr;
            gap: 5px;
         }

        .meio {
            display: flex;
            justify-content: center;
            padding-top: 20px;
        }
        input {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 2px;
        }
        select {
             width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 2px;
        }
        form {
            width: 300px;
        }
        input, select {
            width: 100%;
            padding: 5px;
            font-size: 0,7rem;
            box-sizing: border-box;
        }
        .cabecalho, .cel_cabecalho {
            display: flex;
            padding: 0 10px;
        }
        .cel_cabecalho {
            width: 150px;
            margin-left: 10px;
            margin-right: 10px;
            border: 1px solid black;
        }
        button {
            margin: 10px;
        }
        section {
            justify-items: center;
        }
        

    </style>
    </head>
    <body>
    <section class="inicio">
        <div class="coluna meio">
                <form action="gravar_produtos.php" method="post">
                    <label for="produto">Produto</label>
                    <input type="text" name="produto" id="">

                    <label for="quantidade">Quantidade</label>
                    <input type="text" name="quantidade">

                    <label for="valor">Valor</label>
                    <input type="text" name="valor">

                    <button class="submit">Salvar</button>
                </form>
            </div>
    </section>
    <section class="resultados">
        <div class="resultado">
            <?php
            include 'conexao.php';

            $sql = "SELECT * FROM produtos";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount()>0){
                 echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>ID</div>";
                    echo "<div class='cel_cabecalho'>Nome</div>";
                    echo "<div class='cel_cabecalho'>Quantidade</div>";
                    echo "<div class='cel_cabecalho'>Valor</div>";
                       echo "<div class='cel_cabecalho'>Açoes</div>";
                echo "</div>";
    
            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='cabecalho'>";
                   echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";

                    echo "<form action='editar_produtos.php' method='get'>
                    <input type='hidden' name='id' value='{$linha['id']}'>";

                    echo "<div class='cel_cabecalho'><button>Editar</button><button>Deletar</button></div>";

                    echo "</form>";
                echo "</div>";
            }
            }else{
                echo "não tem registro";
            }
            ?>
        </div>
    </section>    
</body>
</html>
