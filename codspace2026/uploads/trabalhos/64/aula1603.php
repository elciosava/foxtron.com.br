<?php

    include 'conexao.php';

    $dia = $_POST['dia'];
    $assunto = $_POST['assunto'];
    $hora = $_POST['hora'];

    $sql = "INSERT INTO calendario (dia, assunto, hora)
            VALUES (:dia, :assunto, :hora)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':dia', $dia);
    $stmt->bindParam(':assunto', $assunto);
    $stmt->bindParam(':hora', $hora);
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
    <form action="" method="post">
        <label for="dia">Data:</label>
        <input type="date" name="dia" id="">

        <label for="hora">Hora:</label>
        <input type="time" name="hora" id="">

        <label for="assunto">Assunto:</label>
        <input type="text" name="assunto" id="">

        <button type="submit">Salvar</button>
    </form>    

    <div class="resultado">
        <?php

        include "conexao.php";
        $sql = "SELECT * FROM calendario";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

if ($stmt->rowCount() > 0){
        //Cabeçalho da tabela
        echo "<div class='cabecalho'>";
        echo "<div class='cel_cabecalho'>ID</div>";
        echo "<div class='cel_cabecalho'>data</div>";
        echo "<div class='cel_cabecalho'>assunto</div>";
        echo "<div class='cel_cabecalho'>hora</div>";
        echo "</div>";

        //linhas dos produtos
        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='linha'>";
            echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
            echo "<div class='cel_cabecalho'>{$linha['dia']}</div>";
            echo "<div class='cel_cabecalho'>{$linha['assunto']}</div>";
            echo "<div class='cel_cabecalho'>{$linha['hora']}</div>";
            echo "</div>";
        }
    } else {
        echo "<p>Não há registros.</p>";
    }
        ?>
    </div>
</body>
</html>