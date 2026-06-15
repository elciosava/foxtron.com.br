<?php
     $professor = $_GET['professor'];
     $materia = $_GET['materia'];
     $carga = $_GET['carga'];
     $codigo = $_GET['codigo'];
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

        * {
            padding: 0;
            margin: 0;
        }
        
        body {
             background-color: beige
        }
      
        header {
            margin: 0px;
            padding: 15px;
            background: bisque;
            align-items: center;
            justify-content: center;
        }

        .formulario {
            display: flex;
            align-items: center;
            flex-direction: column;
            background: beige;
        }

        h2 {
            display: flex;
            justify-content: center;
        }

        form {
            width: 450px;
        }
        
        input {
            width: 100%;
        }

        .resultado {
             display: flex;
             justify-content: center;
             align-items: center;
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
            <label for="professor">professor</label>
            <input type="text" name="professor" id="">

            <label for="materia">materia</label>
            <input type="text" name="materia" id="">

            <label for="carga">carga</label>
            <input type="text" name="carga" id="">

            <label for="codigo">codigo</label>
            <input type="text" name="codigo" id="">

            <label for="serie">serie</label>
            <input type="text" name="serie" id="">

            <label for="sala">sala</label>
            <input type="text" name="sala" id="">

            <button type="submit">enviar</button>
        </form>
    </div>
    <div class="resultado">
        <?php
             echo "<div class='professor'><span>professor: </span>$professor</div>";
             echo "<div class='materia'><span>materia: </span>$materia</div>";
             echo "<div class='carga'><span>carga horaria: </span>$carga</div>";
             echo "<div class='codigo'><span>codigo de sala: </span>$codigo</div>";
             echo "<div class='serie'><span>serie: </span>$serie</div>";
             echo "<div class='sala'><span>sala de aula: </span>$sala</div>";
        ?>
    </div>
</body>
</html>