<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="resultados">
        <div class= "resultado">
            <?php
            include"conexao.php";

            $sql = "SELECT * FROM calendario";
            $stmt = $conexao->prepare($sql):
            $stmt->execute();

            if ($stmt->rowCount()> 0){
              // Cabeçalho da tabela
              echo "<div class='cabecalho'>";
              echo "<div class='cel_cabecalho'>ID</div>";
              echo "<div class='cel_cabecalho'>calendario</div>";
              echo "<div class='cel_cabecalho'>Quantidade</div>";
              echo "</div>";

              // Linhas dos produtos
              while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                 echo "div class='linha'>";
                 echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                 echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                  echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                  echo "</div>";
              }
         } else {
            echo "<p> Não há registors.</p>";
            }
            ?>
        </div>
    </section>
</body>
</html>