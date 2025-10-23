<?php

?>

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
            background: rgb(44, 72, 109);
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
            padding: 2px;
            
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
            width: 250px;
            margin: 5px; 
        }
        .resultado {
            margin-top: 20px;
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
                    <input type="text" name="quantidade" id="">

                    <label for="valor">Valor</label>
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
                

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='cabecalho'>";
                     echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";

                     echo "<form action='editar_produto.php' method='get'>
                          <input type='hidden' name='id' value='{$linha['id']}'>";

                     echo "<div class='cel_cabecalho'><button type='submit'>Editar</button><button>Deletar</button></div>";

                    echo"</form>";
                echo "</div>";
                }
                }         
            else{
                    echo "<p>não tem registro</p>";
                }
            ?>
        </div>
    </section>
</body>
</html>