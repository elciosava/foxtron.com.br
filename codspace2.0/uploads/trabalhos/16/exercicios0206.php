<?php
$professor = $_GET['professor'];
$materia = $_GET['materia'];
$cargahoraria = $_GET['cargahoraria'];
$codigodeturma = $_GET['codigodeturma'];
$serie = $_GET['serie'];
$saladeaula = $_GET['saladeaula'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
           
            
            

        }
        form {
            width: 450px;

        }
        input {
            width: 100%;
            
        }
        .container {
            display: flex;
            justify-content: center;
            
            text-align: center;
        }
        body {
             
             display: flex;
             justify-content: center;
             align-items: center;
             flex-direction: column;
             background-color: lightblue;
           
             
        }
        header {
           
            display: flex;
            
            height: 50px;
            
        }
        .resultado {
            width: 450px;
            
        }
        
        
       
        
    
        
        
        
        
    </style>
</head>
<body>
    <header>
        <h2>Cadastro do aluno</h2>
        </header>

        

        <?php

        ?>
        <div class="container">
            <form action="" method="get">
                <label for="professor">professor</label>
                <input type="text" name="professor" id="">

                <label for="materia">materia</label>
                <input type="text" name="materia" id="">

                <label for="cargahoraria">cargahoraria</label>
                <input type="number" name="cargahoraria" id="">

                <label for="codigo de turma">codigo de turma</label>
                <input type="number" name="codigodeturma" id="">

                <label for="serie">serie</label>
                <input type="number" name="serie" id="">

                <label for="sala de aula">sala de aula</label>
                <input type="text" name="saladeaula" id="">
                <button type="submit">enviar</button>
                
            </form> 
        </div>
        <div class="resultado">
            <?php
            echo "<div class='professor'><span> professor: </span> $professor </div>";
            echo "<div class='materia'><span> materia: </span> $materia </div>";
            echo "<div class='cargahoraria'><span> cargahoraria: </span>$cargahoraria</div>";
            echo "<div class='codigodeturma'><span> codigodeturma: </span>$codigodeturma</div>";
            echo "<div class='serie'><span> serie: </span>$serie</div>";
            echo "<div class='saladeaula'><span> saladeaula: </span>$saladeaula</div>"

            ?>

        </div>
         
    
</body>
</html>