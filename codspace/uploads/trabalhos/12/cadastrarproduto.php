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
            margin: 0;
            padding: 0;
          }

       body {
        justify-content: center;
        background: linear-gradient(to right, blue , red );
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
      
         .cabecalho {
           display: flex;
           padding: 0 20px;
           border: 1px solid black;
           width: 1000px;           
        padding: 5px 10px;

        }

        .cel_cabecalho {
         width: 200px;

        }

        .linha {
        display: flex;
        border: solid 1px black;
        padding: 5px 10px;
        width: 1000px;
        }

    </style>
    <body>
    <section class="inicio">
        <div class="coluna meio">
                <form action="gravarproduto.php" method="post">

                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="">

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

if ($stmt->rowCount() > 0) {
    echo "<div class='cabecalho'>";
    echo "  <div class='cel_cabecalho'>ID</div>";
    echo "  <div class='cel_cabecalho'>Nome</div>";
    echo "  <div class='cel_cabecalho'>Quantidade</div>";
    echo "  <div class='cel_cabecalho'>Valor</div>";
    echo "  <div class='cel_cabecalho'>Ações</div>";
    echo "</div>";

    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='linha'>";
        echo "  <div class='cel_cabecalho'>{$linha['id']}</div>";
        echo "  <div class='cel_cabecalho'>{$linha['nome']}</div>";
        echo "  <div class='cel_cabecalho'>{$linha['quantidade']}</div>";
        echo "  <div class='cel_cabecalho'>{$linha['valor']}</div>";

        echo "  <div class='acoes'>";
        echo "      <form action='editarproduto.php' method='get' style='display:inline;'>";
        echo "          <input type='hidden' name='id' value='{$linha['id']}'>";
        echo "          <button class='submit'>Editar</button>";
        echo "      </form>";

        echo "      <form action='deletarproduto.php' method='post' style='display:inline;' onsubmit=\"return confirm('Deseja realmente deletar este produto?');\">";
        echo "          <input type='hidden' name='id' value='{$linha['id']}'>";
        echo "          <button class='submit'>Deletar</button>";
        echo "      </form>";
        echo "  </div>"; // fim .acoes
        echo "</div>"; // fim .linha
    }
} else {
    echo "<p>Não há registros.</p>";
}
        
           
            ?>
        </div>
    </section>    
</body>
</html>
