<?php
    $meunome = 'CADASTRO';
    $professor= $_GET ['professor'];
    $materia= $_GET['materia'];
    $carga = $_GET ['carga'];
    $code = $_GET['codigo'];
    $serie= $_GET['serie'];
    $sala= $_GET['sala']

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
        margin: 35px;
        background: lightblue;
        
    }
    .formulario{
        margin: 20px;


    }
    .container{
        align-items: center;
        justify-content: center;
        background: lightcyan;
    }
    
    
    </style>
    
</head>
<body>
    <header>
    <h2><?php echo $meunome ?></h2>

   

    </header>
    <div class="container">
    <div class="formulario">
        <form action="" method="get">
            <label for="professor">professor</label>
            <input type="text" name="professor" id="">

            <label for="materia" >materia</label>
            <input type="text" name="materia" id="">

            <label for="carga">carga horaria</label>
            <input type="text" name="carga" id="">

            <label for="codigo">codigo de turma</label>
            <input type="text" name="codigo" id="">
            
            <label for="serie">serie</label>
            <input type="text" name="serie" id="">

            <label for="sala">sala de aula</label>
            <input type="text" name="sala" id="">
            

        <button type="submit">Enviar</button>



        </form>
    </div>
</div>
    <div class="resultado">
        <?php
        echo "<div class='professor'><span>professor: </span>$professor</div>";
        echo "<div class='materia'><span>materia: </span>$materia</div>";
        echo "<div class='carga'><span>carga: </span>$carga</div>";
        echo "<div class='codigo'><span>codigo: </span>$code</div>";
        echo "<div class='serie'><span>Serie: </span>$serie</div>";
        echo "<div class='sala'><span>sala: </span>$sala</div>";
         ?>
   

    </div>
    
</body>
</html>