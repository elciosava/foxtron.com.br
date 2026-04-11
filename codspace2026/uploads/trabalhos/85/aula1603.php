<?php   
include 'conexao.php';

$assunto = $_POST['assunto']; 
$data   = $_POST['data'];
$hora   = $_POST['hora'];

$sql = "INSERT INTO compromisso (assunto, dia, hora)
                VALUES (:assunto, :dia, :hora)";

        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(':assunto', $assunto);
        $stmt->bindParam(':dia', $data);
        $stmt->bindParam(':hora', $hora);

        $stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 16/03</title>
</head>
<body>
    
        <form action="" method="post">
            <label for="assunto">Assunto</label>
            <input type="text" name="assunto" id="">

            <label for="data">Data</label>
            <input type="date" name="data" id="">

            <label for="hora">Hora</label>
            <input type="time" name="hora" id="">

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
<section class="resultados">
    <div class="resultado">
        <?php
        include 'conexao.php';

        $sql = "SELECT * FROM compromisso";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Cabeçalho da tabela
            echo "<div class=cabecalho'>";
            echo "<div class=cel_cabecalho'>ID</div>";
            echo "<div class='cel_cabecalho'>Compromisso</div>";
            echo "<div lass='cel_cabecalho'>Data</div>";
            echo "<div class='cel_cabecalho'>Hora</div>";
            echo "<div class='cel_cabecalho'>Assunto</div>";
            echo "</div>";

            // Linhas dos compromissos
            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='linha'>"; 
            echo "<div:class=cel_cabecalho'>{$linha['id']}</div>";
             echo "<div:class=cel_cabecalho'>{$linha['dia']}</div>";
              echo "<div:class=cel_cabecalho'>{$linha['assunto']}</div>";
               echo "<div:class=cel_cabecalho'>{$linha['hora']}</div>";
               echo "</div>"; 
        }
               } else {
                echo "<p>Não há registros.</p>";
               }
        
            
        

        ?>

</section>
</html>