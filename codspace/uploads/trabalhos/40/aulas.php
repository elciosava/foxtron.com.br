<?php
include 'conexao.php';

$sql = "SELECT professores.nome, materias.materia FROM `professores` AS
professores INNER JOIN materias AS materias WHERE professores.id =
materias.id_professores";

 $stmt = $conexao->prepare($sql);
 $stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      
body {          
            background: linear-gradient(to top, rgba(255 255 240), rgba(255 130 171));/*cor do fundo */
            font-family: Verdana;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-size: 15px;
        }

        .linha {
            margin-bottom: 25px;
            padding: 20px 0px;
            width: 500px;
        
        }

        .resultado {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 500px;

        }
     
    </style>
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