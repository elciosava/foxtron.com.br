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
            <form action="gravar_professor.php" method="post">
                <label for="materia">Materia</label>
                <input type="text" name="nome">


                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
    <section class="resultado">
        <div class="resultao">
<?php
 include "conexao.php";
    
    $sql = "SELECT * FROM professores";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount()>0){
    echo "<div class='linha'>";    
        echo "<div class='cel_cabecalho'>id</div>";
        echo "<div class='cel_cabecalho'>Nome</div>";
    echo "</div>";

    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='linha'>";
        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";

        echo "<div class='cel_cabelho'>";

        echo "<form action='editar_produtos.php' method='get' style='display:inline;'>";
        echo "<input type='hidden' name='id' value='{$linha['id']}'>";
        echo "<button type='submit'>Editar</button>";
        echo "</form>";

        echo "<form action='deletar_produtos.php' method='post' style='display:inline;' onsubmit=\"return confirm('Deseja realmente deletar este nome?');\">";
        echo "<input type='hidden' name='id' value='{$linha['id']}'>";
        echo "<button type='submit'>Deletar</button>";
        echo "</form>";

        echo "</div>";

        echo "</div>";
      }
    } else {
        echo "<p>Não há registros.</p>";
    }
    ?>
        </div>
    </section>
</body>
</html>