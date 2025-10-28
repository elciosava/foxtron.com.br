<?php
     include 'conexao.php';

     $sql = "SELECT professores.nome, materia.materia FROM professores AS professores
             INNER JOIN materia AS materia  WHERE professores.id = materia.id_professores";

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
        .resultado{
            display: flex;
            justify-content:center;
            align-items:center;
            width: 500px;

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
                    echo "<div class='resultado'>";
                    echo "<div class='linha'>{$linha['nome']}</div><div class='linha'>{$linha['materia']}</div>";
                    echo "</div>";
                }
           ?>
        
</div>
</section>
    
</body>
</html>