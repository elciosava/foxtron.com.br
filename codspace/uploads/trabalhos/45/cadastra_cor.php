<?php
    include "conexao.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $cor = $_POST['cor'];
        $color = $_POST['color'];

    $sql = "INSERT INTO cores (cor, color)
             VALUES (:cor, :color)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam('cor', $cor);
    $stmt->bindParam('color', $color);

    if ($stmt->execute()){
        header("Location:cadastra_cor.php");
        exit;
    }else{
        echo "<p>nao deu</p>";
    }
}
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
        <form action="cadastra_cor.php" method="post">
            <label for="cor">Cor</label>
            <input type="text" name="cor" id="">

            <input type='color' name='color' id=''>

            <button type="submit">Selecionar</button>
        </form>
    </section>
    <?php 
include "conexao.php";
    
    $sql = "SELECT * FROM cores";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount()>0){
    echo "<div class='linha'>";    
        echo "<div class='cel_cabecalho'>id</div>";
        echo "<div class='cel_cabecalho'>cor</div>";
        echo "<div class='cel_cabecalho'>color</div>";

    echo "</div>";

    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='linha'>";
        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['cor']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['color']}</div>";

        echo "<div class='cel_cabelho'>";
    }
}
?>
</div>
</body>
</html>