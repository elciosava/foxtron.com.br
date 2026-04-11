
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         * {
            margin: 0;
            padding: 0;
        } 

         header {
            height:50px;
        }

        html {
            font-family: Segoe UI;
            background: lightblue;
        }  

         form {
            width: 400px;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 30px;
            height: 50px;
        }
                                         
        .container {
            display: flex;
            justify-content: center;
            align-items: center;           
        }

        input, select {
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
             height: 100vh; 
        }

        .cabecalho{
            display: flex;
            padding: 5px 15px;
            border: solid black 1px ;
            width: 1000px;
        }

        .linha {
            display: flex;
            border: solid  black 1px;
            padding: 5px 15px;
        }

        .cel_cabecalho {
            width: 170px;
        }

        
    </style>
</head>
<body>
    <header>

    </header>
<section class="endereco">
    <div class="container">

         <form action="gravar_produto.php" method="post">

         <label for="produto">Produto</label>
         <input type="text"  name="produto" id="">

         <label for="quantidade">Quantidade</label>
         <input type="text"  name="quantidade" id="">

         <label for="valor">Valor</label>
         <input type="text"  name="valor" id="">

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

             if ($stmt->rowCount()>0){
                echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>id</div>";
                    echo "<div class='cel_cabecalho'>Produto</div>";
                    echo "<div class='cel_cabecalho'>Quantidade</div>";
                    echo "<div class='cel_cabecalho'>Valor</div>";
                    echo "<div class='cel_cabecalho'>Ações</div>";
                    echo "</div>";

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['valor']}</div>"; 

                    echo "<div class='cel_cabecalho'>";

                    echo "<form action='editar_produto.php' method='get' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='subit'>Editar</button>";
                    echo "</form>";

                    echo "<form action='deletar_produto.php' method='post' style='display:inline;' onsubmit=\"return confirm('Deseja realmente deletar este produto?');\">";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='subit'>Deletar</button>";
                    echo "</form>";

                    echo "</div>";
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