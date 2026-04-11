<?php
    include "conexao.php";

    $sql = "SELECT * FROM `professores`";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

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
            <form action="gravar_materias.php" method="post">
                <label for="materia">Materia</label>
                <input type="text" name="materia" id="">

                
         <select name="professor" id="">
            <?php
            while ($professor = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='{$professor['id']}'>{$professor['nome']}</option>";
    }
            ?>
         </select>
         <button type="submit">salvar</button>
            </form>
        </div>
    </section>
     <section class="resultado">
        <div class="resultao">
<?php
            include "conexao.php";
    
    $sql = "SELECT * FROM materias";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount()>0){
    echo "<div class='linha'>";    
        echo "<div class='cel_cabecalho'>id</div>";
        echo "<div class='cel_cabecalho'>id_professor</div>";
        echo "<div class='cel_cabecalho'>materia</div>";
    echo "</div>";

    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='linha'>";
        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['id_professor']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['materia']}</div>";

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
</body>
</html>