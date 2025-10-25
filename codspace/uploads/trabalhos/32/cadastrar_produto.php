<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style>
    /* Reset básico */
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background: rgba(42, 137, 200, 1);
        font-family: Verdana, sans-serif;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    form {
        width: 350px;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    input,
    select {
        width: 100%;
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: 0.3s ease;
    }

    input:focus,
    select:focus {
        border-color: rgba(42, 134, 200, 1);
        outline: none;
        box-shadow: 0 0 5px rgba(100, 42, 200, 0.3);
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        margin-top: 20px;
        width: 100%;
    }

    .cabecalho {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 1000px;
        border: 1px solid black;
        background-color: #f0f0f0;
        padding: 10px 20px;
        font-weight: bold;
        text-align: center;
    }

    .cel_cabecalho {
        width: 250px;
    }

    .linha {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 1000px;
        border: 1px solid black;
        border-top: none;
        padding: 10px 20px;
        background-color: #fff;
        text-align: center;
        transition: background-color 0.2s ease;
    }

    .linha:hover {
        background-color: #f9f9f9;
    }

    .linha div {
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

                $sql = "SELECT * FROM produtos";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                if($stmt->rowCount()>0){
                    echo "<div class='cabecalho'>";
                        echo "<div class='cel_cabecalho'>ID</div>";
                        echo "<div class='cel_cabecalho'>Produto</div>";
                        echo "<div class='cel_cabecalho'>Quatidade</div>";
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
                        
                        //Formulario Editar
                        echo "<form action='editar_produto.php' method='get' style='display:inline;'>";
                        echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                        echo "<button type='submit'>Editar</button>";
                        echo "</form>";

                        //formulario Deletar
                         echo "<form action='deletar_produto.php' method='post' style='display:inline;' onsubmit=\"return confirm('Deseja realmente deletar este produto?');\">";
                        echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                        echo "<button type='submit'>Deletar</button>";
                        echo "</form>";

                        echo "</div>"; // fecha celula ações

                        echo "</div>"; // fecha linha
                }
            }else {
                echo "<p>Não há registros.</p>";
            }    
      
            ?>
        </div>
    </selection>
</body>
</html>
