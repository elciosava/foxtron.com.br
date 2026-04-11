<?php

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $cor = $_POST['cor'];

    $sql = "INSERT INTO cores (nome, cor)
            VALUES (:nome, :cor)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cor', $cor);

    if ($stmt->execute()){
        header("Location:cores.php");
        exit;
    }else{
        echo "não deu boa!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .cabecalho {
            display: flex;
            padding: 5px 10px;
            border: 1px solid black;
            width: 400px;
        }

        .cel_cabecalho {
            width: 120px;
        }

        .linha {
            display: flex;
            border: solid 1px black;
            padding: 5px 10px;
            width: 400px;
        }
        .resultado {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Digite a cor</label>    
        <input type="text" name="nome" id="">
        <label for="cor">Escolha a cor</label>
        <input type="color" name="cor" id="">
        <button type="submit">Salvar</button> 
    </form>

    <div class="resultado">
            <?php
            include "conexao.php";

            $sql = "SELECT * FROM cores";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Cabeçalho da tabela
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Nome</div>";
                echo "<div class='cel_cabecalho'>Cor</div>";
                echo "</div>";

                // Linhas dos produtos
                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>"; 
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['cor']}</div>";        
                    echo "</div>"; // fecha linha
                }
            } else {
                echo "<p>Não há registros.</p>";
            }
            ?>
        </div>

</body>
</html>