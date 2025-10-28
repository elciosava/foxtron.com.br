<?php
include 'conexao.php';

$sql = "SELECT professores.nome, materia.materia FROM professores AS professores
 INNER JOIN materias AS materia WHERE professores.id = materia.id_professores";

 $stmt = $conexao->prepare($sql);
 $stmt->execute();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><style>
       


* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: "Inter", "Manrope", "Poppins", sans-serif;
  line-height: 1.6;
  display: flex;
  justify-content: center;

}


.container {
  width: 100%;
  max-width: 900px;
  display: flex;
  flex-direction: column;
  gap: 16px;
  z-index: 1;
  position: relative;
}

.linha{
    border:solid 1px black;
    width:200px;
    
}

.resultado{
    width:350px;
    display: flex;
    width:400px;
}





    </style>
</head>
<body>
    <section>
        <div class="container">
            <?php
                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='resultado'>";
                   echo "<div class='linha'> {$linha['nome']}</div>
                            <div class='linha'> {$linha['materia']}</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </section>
</body>
</html>