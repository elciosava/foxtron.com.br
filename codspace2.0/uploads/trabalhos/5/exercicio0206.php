<?php
 $professor=$_GET['professor'];
 $cargahoraria=$_GET['cargahoraria'];
 $codigodaturma=$_GET['codigodaturma'];
 $serie=$_GET['serie'];
$saladeaula=$_GET['saladeaula'];
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
            padding: 10px;
        }
        header{
            margin: 25px;
            background-color: lightseagreen;
        }
        .formulario{
            margin: 20px;
        }
        .container{
            align-items: center;
            justify-content: center;
            background: lightcoral;
        }
    </style>
</head>

<body>

    <header>
    </header>
    <div class="formulario">
        <form action="" method="get">
                <label for="professor">professor</label>
                <input type="text" name="professor" id="">

                <label for="carga horaria">carga horaria</label>
                <input type="text" name="cargahoraria" id="">

                <label for="codigo da turma">codigo da turma</label>
                <input type="text" name="codigodaturma" id="">

                <label for="serie">serie</label>
                <input type="text" name="serie" id="">
  
                <label for="sala de aula">sala de aula</label>
                <input type="text" name="saladeaula" id="">
            <button type="submit">enviar</button>
        </form>
    </div>
    <div class="resultado"> 
        <?php
    echo "<div class='produto'><span>professor: </span>$professor</div>";
     echo "<div class='produto'><span>materia: </span>$cargahoraria</div>";
      echo "<div class='produto'><span>codigodaturma: </span>$codigodaturma</div>";
       echo "<div class='produto'><span>serie: </span>$serie</div>";
        echo "<div class='produto'><span>saladeaula: </span>$saladeaula</div>";


?>
   
    </div>
</body>
</html>