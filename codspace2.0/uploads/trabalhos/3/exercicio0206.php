<?php


$professor = $_GET['professor'];
$materia = $_GET['materia'];
$cargahoraria = $_GET['cargahoraria'];
$codigoturma = $_GET['codigoturma'];
$serie = $_GET['serie'];
$aula = $_GET['aula'];



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

   <style>
            
            * {
                    margin:0px;
                    padding: 0px;
            }
            header {
                
                align-items: center;
                justify-content: center;
                display: flex;
                
            }
            .formulario {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;

            }
            form {
                width: 300px;
                padding: 15px;
                
            }
            input {
                width: 100%;
                
            
            }
            body {
                background-color: blue;
            

            }
            
            
        </style>    

   
</head>
<body>
    <header>
      
         <h2>aluno</h2>
</header>
      
    


        

        
        <div class="formulario">
            <form action="" method="get">

            <label for="materia">materia</label>
            <input type="text" name="materia" id="">

            <label for="turma">turma</label>
            <input type="number" name="turma" id="">

            <label for="serie">serie</label>
            <input type="number" name="serie" id="">

            <label for="aula">aula</label>
            <input type="number" name="aula" id="">

            <label for="aula">aula</label>
            <input type="number" name="aula" id="">

            <button type="submit">Enviar</button>


            

        </form>

        <?php

        echo "<div class='aluno'><span>Materia: </span>$materia</div>";
        echo "<div class='aluno'><span>professor: </span>$professor</div>";
        echo "<div class='aluno'><span>cargahoraria: </span>$cargahoraria</div>";
        echo "<div class='aluno'><span>codigoturma: </span>$codigoturma</div>";
        echo "<div class='aluno'><span>serie: </span>$serie</div>";
        echo "<div class='aluno'><span>aula: </span>$aula</div>";

        ?>

        </div>


        </div>
   

</body>
</html>