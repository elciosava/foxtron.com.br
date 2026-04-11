<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cod_cor = $_POST['cod_cor'];
    $nome_cor = $_POST['nome_cor'];
   
    $sql = "INSERT INTO cores (cod_cor, nome_cor)
            VALUES (:cod_cor, :nome_cor)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':cod_cor', $cod_cor);
    $stmt->bindParam(':nome_cor', $nome_cor);
    $stmt->execute();

    $sql = " SELECT * FROM  cores;";

     $stmt = $conexao->prepare($sql);
     $stmt->execute();

    
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
     <form action="" method="post">
        <div class="container">
    <label for="cod_cor">Cor</label>
    <input type="color" name="cod_cor" id="cod_cor">
     <label for="nome_cor">Nome dessa cor</label>
    <input type="text" name="nome_cor" id="nome_cor">
    <button type="submit">Enviar</button>
</div>
</form>
    <section>
        <div class="container">
            <?php
             while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='resultado'>";
                echo "<div class='cod_cor'>{$linha['cod_cor']}</div>";
                echo "<div class='nome_cor'>{$linha['nome_cor']}</div>";
                echo "</div>";
             }
            ?>
        </div>
    </section>
    
</body>


</head>
</html>