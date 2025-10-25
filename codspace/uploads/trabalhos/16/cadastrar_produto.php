<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
    /* Fundo com gradiente suave e cor de apoio */
    background: linear-gradient(135deg, rgba(90, 170, 245, 1), rgba(40, 120, 220, 1));
    background-attachment: fixed;

    /* Tipografia */
    font-family: 'Verdana', sans-serif;
    color: #222;
    line-height: 1.5;

    /* Layout centralizado */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    /* Tamanho e espaçamento */
    height: 100vh;
    margin: 0;
    padding: 20px;

    /* Suavização */
    transition: background 0.5s ease;
}

    form {
        width: 350px;
        margin-bottom: 20px;
        background: white;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0,0,0,0.2);
    }

    input,
    select {
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 10px;
        padding: 8px;
        font-size: 0.8rem;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cabecalho {
        display: flex;
        justify-content: space-between;
        padding: 10px 20px;
        border: 1px solid black;
        width: 1000px;
        background: #f0f0f0;
        font-weight: bold;
    }

    .cel_cabecalho {
        width: 250px;
        text-align: center;
    }

    .linha {
        display: flex;
        border: 1px solid black;
        padding: 5px 20px;
        width: 1000px;
        background: white;
    }

    .linha div {
        width: 250px;
        text-align: center;
    }

    .resultado {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 1000px;
        flex-direction: column;
        gap: 5px;
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
                    <input type="text" name="valor" id="">

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
                echo "<div class='linha'>";
                     echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";

                     echo "<div class='cel_cabecalho'>";

                     echo "<form action='editar_produto.php' method='get' style='display:inline;'>";
                     echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                     echo "<button type='submit'>Editar</button>";
                     echo "</form>";

                     echo "<form action='deletar_produto.php' method='post' style='display:inline;' onsubmit=\"return confirm('Deseja realmente deletar esse produto?');\">";
                     echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                     echo "<button type='submit'>Deletar</button>";
                     echo "</form>";

                    echo "</div>"; 

                    echo "</div>";
                }
            }else {
                echo "<p>Não há registros.</p>";
            }
            ?>
        </div>
    </section>
</body>
</html>