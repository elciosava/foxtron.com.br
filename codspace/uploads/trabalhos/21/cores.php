<?php

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    
    $cor = $_POST['cor'];

    $sql = "INSERT INTO cor (nome,cor)
    Values (:nome, :cor)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome',$nome);
    
    $stmt->bindParam(':cor',$cor);
    
    if ($stmt->execute()){
     header("location:cores.php");
     exit;
    }else{
        echo"Não Deu Boa!!"; 
    }
}

$sql = "SELECT * FROM cor;";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <label for="nome">Nome da Cor</label>
            <input type="text" name="nome" id="">

            <label for="cor">Cor</label>
            <input type="color" name="cor" id="">
            <button submit="submit">Salvar Cor</button>
        </div>
    </form>

    <section>
        <div class="container">
            <?php
               while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                  echo "<div class='resultado'>";
                  echo "<div class='nome'>{$linha['nome']}</div>
                        <div class='cor'>{$linha['cor']}</div>";
                  echo "</div>";
               }
            ?>
        </div>
     </section>
</body>
</html>