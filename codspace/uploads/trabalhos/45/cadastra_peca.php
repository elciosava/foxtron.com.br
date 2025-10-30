<?php
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <div class="container">
            <form action="grava_peca.php" method="post">
                <label for="pecas">Peças</label>
                <input type="text" name="pecas">

                  <label for="quantidade">quantidade</label>
                <input type="number" name="quantidade">

                <button type="submit">Salvar</button>
            </form>
            
        </div>
    </section>
    <section class="resultado">
        <div class="resultao">
<?php
 include "conexao.php";
    
    $sql = "SELECT * FROM pecas";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount()>0){
    echo "<div class='linha'>";    
        echo "<div class='cel_cabecalho'>id</div>";
        echo "<div class='cel_cabecalho'>pecas</div>";
        echo "<div class='cel_cabecalho'>quantidade</div>";
    echo "</div>";

    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='linha'>";
        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['pecas']}</div>";
         echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";

        echo "<div class='cel_cabelho'>";

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
    } else {
        echo "<p>Não há registros.</p>";
    }
    ?>
        </div>
</body>
</html>