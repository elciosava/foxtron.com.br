<?php
    

    $professor = $_GET ['professor'];
    $matéria = $_GET ['matéria'];
    $carga  = $_GET ['carga'];
    $codigo = $_GET['codigo'];
    $serie = $_GET ['serie'];
    $sala = $_GET['sala'];
?>  
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     * {
        padding: 0px;
        margin: 0px;
    }

    body {
        background-color: lightblue;
    }
    header {
        margin: 0;
        padding:15px;
        background-color: lightblue;
        align-items: center;
        justify-content: center;
    }

    .formulario {
        display: flex;
        align-items: center;
        flex-direction: column;
        background-color: lightskyblue;
    }
    h2{
        display: flex;
        justify-content: center;
    }
    form {
        width: 350px;
    }

    input {
        width: 100%;
    }

    .resultado{
        align-items: center;
        justify-content: center;
        display: flex;
        flex-direction: column;
    }
    </style>
    
</head>
<body>
    <header>
       <h2>cadastro</h2> 
    </header>
    <div class="formulario">
        <form action="" method="get">
          <label for="professor">Professor:</label>  
          <input type="text" name="professor" id="">

          <label for="matéria">matéria:</label>
          <input type="text" name="matéria" id="">

          <label for="carga">carga:</label>   
          <input type="number" name="carga horaria" id="">

          <label for="codigo">codigo:</label>   
          <input type="number" name="codigo" id="">

          <label for="serie">serie:</label>   
          <input type="text" name="serie" id="">

          <label for="sala">sala de aula:</label>   
          <input type="text" name="sala" id="">

          <input type="submit" value="Enviar">

        </form>

    </div>

    <div class="resultado">
        <?php
        echo "<div class='professor'><span>professor: </span>$professor</div>";
        echo "<div class='matéria'><span>matéria: </span>$matéria</div>";
        echo "<div class='carga><span>carga horaria: </span>$carga</div>";
        echo "<div class='codigo'><span>codigo: </span>$codigo</div>";
        echo "<div class='serie'><span>serie: </span>$serie</div>";
        echo "<div class='sala'><span>sala: </span>$sala</div>";
        ?>
    </div>
</body>
</html>