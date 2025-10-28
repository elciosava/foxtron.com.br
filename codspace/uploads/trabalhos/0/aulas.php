<?php
include 'conexao.php';

$sql = "SELECT professores.nome, materias.materia FROM `professores` AS
professores INNER JOIN materias AS materias WHERE professores.id =
materias.id_professores";

 $stmt = $conexao->prepare($sql);
 $stmt->execute();
?>

<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <section>
            <div class="container">
                <?php
                    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<div class='resultado'>";
                        echo"<div class='linha'>{$linha['nome']}</div>
                             <div class='linha'>{$linha['materia']}</div>";
                        echo "</div>";
                    }
                ?>
            </div>
        </section>
</body>
</html>