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
            background: linear-gradient(to top, rgba(155 205 155), rgba(110 139 61));
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
            padding: 5px;
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
            width: 180px;
            margin: 5px; 
        }
        .linha {
            display: flex;
            border: solid 1px black;
            padding: 5px 10px;
        }
        .resultado {
            margin-top: 20px;
        }
        .form-box {
            background-color: rgba(255, 255, 255, 0.83); 
            border: 3px solid rgba(11, 88, 41, 1); 
            border-radius: 10px; 
            padding: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgb(105 139 105);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
            margin-top: 2px;
        }
        button:hover {
             background-color: rgba(30, 63, 30, 1);
        }       
    </style>
</head>
<body>
    <section class="endereco">
        <div class="container">
            <div class="form-box">
        <form action="gravar_produto.php" method="post">    
                    <label for="produto">Produto</label>
                    <input type="text" name="produto" id="" placeholder="Nome do Produto">

                    <label for="quantidade">Quantidade</label>
                    <input type="text" name="quantidade" id="" placeholder="Quantidade">

                    <label for="valor">Valor</label>
                    <input type="number" name="valor" id="" placeholder="Valor">
                      
                    <button type="submit">Salvar</button>
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

                if($stmt->rowCount()>0){
                echo "<div class='cabecalho'>";
                     echo "<div class='cel_cabecalho'>ID</div>";
                     echo "<div class='cel_cabecalho'>Produto</div>";
                     echo "<div class='cel_cabecalho'>Quantidade</div>";
                     echo "<div class='cel_cabecalho'>Valor</div>";
                     echo "<div class='cel_cabecalho'>Ações</div>";
                echo "</div>";
                

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='linha'>";
                     echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";

                     echo"<div class='cel_cabecalho'>";

                    echo "<form action='editar_produto.php' method='get' style='display-inline; width: 80px; display: inline;'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Editar</button>";
                    echo "</form>";

                    echo "<form action='deletar_produto.php' method='post' style='display-inline; width: 80px; display: inline; margin-left: 5px;' onsubmit=\"return confirm('Deseja realmente deletar este produto?');\">";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Deletar</button>";
                    echo "</form>";

                    echo "</div>";

                    echo "</div>";
                } 
                }else{
                    echo "<p>Não há registros</p>";
                }
            ?>
        </div>
    </section>
</body>
</html>