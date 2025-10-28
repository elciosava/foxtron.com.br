<?php

    include 'conexao.php';

    $sql = "SELECT professores.nome, materia.materias FROM professores AS professores
            INNER JOIN materias AS materia WHERE professores.id = materia.id_professores";

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
        
        .resultado {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 400px;
        }
        .linha {
            border: solid 1px black;
            width: 200px;
        }
         *{
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #3a3a3a, #1f1f1f);
            color: #f0f0f0;
        }


       
    
    </style>
</head>
<body>
    <section>
        <div class="container">
            <?php
            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='resultado'>";
                echo "<div class='linha'>{$linha['nome']}</div><div class='linha'>{$linha['materias']}</div>";
                echo"</div>";
            }


            ?>
        </div>
    </section>
    
</body>
</html>