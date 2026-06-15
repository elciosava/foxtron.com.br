<?php
$professor = $_GET['professor'];
$materia = $_GET['materia'];
$cargahoraria = $_GET['carga_horaria'];
$codigodaturma = $_GET['codigo_da_turma'];
$serie = $_GET['serie'];
$sala = $_GET['sala'];


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;

        }

        header{
            display: flex;
            align-items: center;
            justify-content: center;
            background: skyblue;
            height: 40px;
        }

        input{
            width: 100%;
        }

        form{
            width: 300px;
            padding: 15px;
            
        }
        .formulario{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        body{
            background: lightblue;
        }
    </style>
</head>
<body>
    <header>
        <h2>cadastro</h2>
       
   
    </header>
    <div class="formulario">
        <form action="" method="get">
 <label for="professor">professor</label>
 <input type="text" name="professor" id="">

 <label for="materia">materia</label>
 <input type="text" name="materia" id="">

 <label for="codigo da turma">codigo da turma</label>
 <input type="number" name="codigo_da_turma" id="">

 <label for="serie">serie</label>
 <input type="number" name="serie" id="">

 <label for="carga horaria">carga horaria</label>
 <input type="number" name="carga_horaria" id="">

 <label for="sala">sala</label>
 <input type="number" name="sala" id="">
        

<button type="submit">enviar</button>

</form>
<div class="resultado">
       <?php
        echo "<h2>$meunome</h2>";
       
        
        echo "<div class='professor'><span>professor: </span>$professor</div>";
        echo "<div class='materia'><span>materia: </span>$materia</div>";
        echo "<div class='codigo da turma'><span>codigo: </span>$codigodaturma</div>";
        echo "<div class='serie'><span>serie: </span>$serie</div>";
        echo "<div class='carga horaria'><span>carga horaria: </span>$cargahoraria</div>";
        echo "<div class='sala'><span>sala: </span>$sala</div>";



        ?>
    </div>
    </div>

    
</body>
</html>