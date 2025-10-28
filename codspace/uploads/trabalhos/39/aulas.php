<?php
    include 'conexao.php';

    $sql = "SELECT professores.nome, materias.materia FROM `professores` AS professores INNER JOIN materias AS materias WHERE professores.id = materias.id_professores";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><style>
        
        html {
            background: lightgreen;
        }  
                                    
        .resultado {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 350px;
            padding: 1px 17px
        }

        .linha {
            margin-bottom: 25px;
            border: solid 1px red;
            width: 350px;
            

        }

         body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
             height: 100vh; 
        }

        
    </style>
</head>
<body>
    <section>
        <div class="contriner">
             <?php
                 while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='resultado'>";
                    echo "<div class='linha'>{$linha['nome']}</div>
                          <div class='linha'>{$linha['materia']}</div>";
                    echo "</div>";
                 }
             ?>
        </div>
</section>
</body>
</html>