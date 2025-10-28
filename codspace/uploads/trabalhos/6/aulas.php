<?php
    include 'conexao.php';


    $sql = "SELECT professores.nome, materias.materia FROM `professores` AS
    professores INNER JOIN materias AS materias WHERE professores.id = materias.id_professores";

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
        body {
            background: linear-gradient(to top, rgba(217, 226, 144, 1), rgba(223, 208, 0, 0.88));
            font-family: Verdana;
            color: #2e2d2dff;
            font-size: 15px;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .resultado {
           
            display: flex;
            justify-content: center;
            align-items: center;
            width: 500px;
            
        }
        .linha {
            margin-bottom: 35px;
            border: solid 1px black;
            width: 250px;
            padding: 8px 0px;
            
        }
        
    </style>
</head>
<body> 
    <section>
        <div class="container">
            <?php
                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo"<div class='resultado'>";
                    echo"<div class='linha'>{$linha['nome']}</div>
                         <div class='linha'>{$linha['materia']}</div>";
                    echo"</div>";
                         
                }
            ?>
        </div>
    </section>
    
</body>
</html>