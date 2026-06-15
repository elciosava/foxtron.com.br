<?php
$meunome = 'Nycolas';

$professor = $_GET['professor'];
$materia = $_GET['materia'];
$cargohorario = $_GET['cargohorario'];
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
</head>
<body>
    <style>
        *{
            padding:0;
            margin:0;
        }
        header{
            background-color: gray; 
            padding: 40px;
            width: 100%;


        }
        form{
            width: 200px;
        }
        body{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    
        }
    </style>
    
    <header>
        
        <h2><?php echo $meunome?></h2>

        <?php
        echo "<h2>$meunome<h2>"; 
        ?>
        

</header>
            <div class="formulario">
                <form action=""method="get">

                    <label for="professor">professor</label>
                    <input type="text" name="professor" id="">

                    <label for="materia">materia</label>
                    <input type="namber" name="materia" id="">

                    <label for="cargohorario" class=>cargo horaria</label>
                    <input type="namber" name="cargohorario">
                    
                    <label for="codigodeturma">codigo da turma </label>
                    <input type="namber" name="codigodeturma" id="">

                    <label for="serie" class=>serie</label>
                    <input type="namber" name="serie">


                    <label for="saladeaula" class=>saladeaula</label>
                    <input type="namber" name="saladeaula">
                    
                    <button type="submit">Enviar</button>

                    <div class="resultado">
                        <?php

                        echo "<div class='produto'><span>professor:</span>$professor</div>";
                         echo "<div class='produto'><span>materia:$materia</span></div>";
                         echo "<div class='produto'><span>cargohorario:$cargohorario </span></div>";
                         echo "<div class='produto'><span>codigodeturma:$codigodeturma </span></div>";
                          echo "<div class='produto'><span>serie:$serie </span></div>";
                       echo "<div class='produto'><span>saladeaula:$saladeaula </span></div>";
                        ?>
                    </div>




</form> 


</div>
</body>
</html>