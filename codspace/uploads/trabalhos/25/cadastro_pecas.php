<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pecas = $_PECAS['pecas'];

    $sql = "INSERT INTO pecas (pecas)
                VALUES (:pecas)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam('pecas', $pecas);

    if ($stmt->execute()) {
        header("location:cadastro_pecas.php");
        exit;
    }else{
        echo "não deu certo!!";
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
    <section id="inicio">
        <div class="form">
            <form action="" method="post">
            <label type="text" name="peca" id="">
            <button type="submit">Salvar</button>
        </form>
</div>
    </section>
    <section id="produtos">
        <div class="produtos">
            <?php
            include "conexao.php";

            $sql = "SELECT * FROM pecas";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Peça</div>";


            }
            ?>
    
</body>
</html>