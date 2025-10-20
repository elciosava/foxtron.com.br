<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <style>
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
            padding: 20px;
            border: 1px solid black;
        }
        .cel_cabecalho {
            width: auto;
            margin-left: 10px;
            margin-right: 10px;
            border: 1px solid black;
        }
       

    </style>
    <body>

        <div class="container">
                <form action="gravar_produto.php" method="post">
                    <label for="produto">Produto</label>
                    <input type="text" name="produto" id="">

                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade">

                    <label for="valor">valor</label>
                    <input type="number" name="email">

                    <label for="senha">Senha</label>
                    <input type="password" name="valor">

                    <button class="submit">Salvar</button>
                </form>
            </div>
    </section>
    <section class="resultados">
        <div class="resultado">
            <?php
            include 'conexao.php';

            $sql = "SELECT * FROM usuarios";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount()>0){
                echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>ID</div>";
                    echo "<div class='cel_cabecalho'>produto</div>";
                    echo "<div class='cel_cabecalho'>quantidade</div>";
                    echo "<div class='cel_cabecalho'>valor</div>";
                echo "</div>";
   
            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['sobrenome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['email']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['senha']}</div>";
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

