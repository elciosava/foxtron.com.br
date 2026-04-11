<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
          margin: 0;
          padding: 0;
        }
    </style>
</head>
<body>
    <h2>Cadastrar Peças</h2>
        <div class="container">

            <form action="gravar_pecas.php" method="post">
                <label for="nome">Matéria-Prima</label>
                <input type="text" name="nome" id="">

                <button type="submit">Salvar</button>
            </form>
        </div>
<section class="resultados">
        <div class="resultado">
            <?php
                include "conexao.php";

                $sql = "SELECT * FROM pecas";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                if($stmt->rowCount()>0){
                    echo "<div class='cabecalho'>";
                        echo "<div class='cel_cabecalho'>ID</div>";
                        echo "<div class='cel_cabecalho'>Peças</div>";
                        echo "<div class='cel_cabecalho'>Ações</div>";
                    echo "</div>";
                        
                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='linha'>";
                        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['peca']}</div>";

                    echo "<div class='cel_cabecalho'>";

                    echo "<form action='entrada.php' method='get' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Entrada</button>";
                    echo "</form>";

                     echo "<form action='saida.php' method='get' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Saida</button>";
                    echo "</form>";

                    echo "</div>";
                    echo "</div>";


                }
            } else{
                echo "<p>Não há registro.</p>";
            }
                  
            ?>
        </div>
    </section>
</body>
</html>