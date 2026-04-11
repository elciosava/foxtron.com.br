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
    <h2> Cadastrar Peça</h2>

    <form action="gravar_peca.php" method="post">

        <label for="peca">Peça de número 1</label>
        <input type="text" name="peca" id="">

        <button type="submit">Salvar</button>
    </form>
        <section class="resultados">
        <div class="resultado">
            <?php
                include "conexao.php";

                $sql = "SELECT * FROM peca";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                if($stmt->rowCount()>0){
                    echo "<div class='cabecalho'>";
                        echo "<div class='cel_cabecalho'>ID</div>";
                        echo "<div class='cel_cabecalho'>Pecas</div>";
                        echo "<div class='cel_cabecalho'>Ações</div>";
                    echo "</div>";
                        
                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='linha'>";
                        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['peca']}</div>";

                        echo "<div class='cel_cabeclho'>";

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
            }  else {
                echo "<p>Não há registros.</p>";
            }
            ?>
        </div>
    </section>
</body>
</html>