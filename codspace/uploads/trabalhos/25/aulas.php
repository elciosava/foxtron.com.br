<?php
include 'conexao.php';

$sql = "SELECT professores.nome, materias.materia FROM professores AS professores
INNER JOIN materias AS materias WHERE professores.id = materias.id_professores";

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
        * {
            padding: 0;
            margin: 0;
        }

        form {
            width: 300px;
        }
        

        body {
            background: rgba(18, 108, 226, 0.93);
            font-family: Verdana;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            display: flex;
            height: 100vh;
        }
        .resultado{
            display:flex;
            justify-content: center;
            align-items: center;
            width: 350px;
        }
        .linha {
            border: solid 1px black;
            width: 200px;
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <?php
                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo"<div class='resultado'>";
                    echo "<div class ='linha'>{$linha['nome']}</div>
                          <div class ='linha'>{$linha['materia']}</div>" ;
                    echo "</div>";
                }
            ?>
        </div>
    </section>
</body>
</html>