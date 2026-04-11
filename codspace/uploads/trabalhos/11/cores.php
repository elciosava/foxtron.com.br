<?php

include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $cor = $_POST['cor'];


    $sql = "INSERT INTO cores (nome, cor)
            VALUES (:nome, :cor)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cor', $cor);
  
    if ($stmt->execute()){
        header("location:cores.php");
        exit;
    }else{
        echo "nao deu boa!!";
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


    <section class="resultados">
        <div class="resultado">
            <?php
            include "conexao.php";

            $sql = "SELECT * FROM cores";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Nome</div>";
                echo "<div class='cel_cabecalho'>Cor</div>";
                echo "</div>";


                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['cor']}</div>";                       

                    echo "<div class='cel_cabecalho'>";
                         echo "</div>";
                }
            } else {
                echo "<p>Não há registros</p>";
            }
            ?>
        </div>
    </section>
</body>
</html>