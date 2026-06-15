<?php
    $nome = $_GET["nome"]
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
 <style>
     * {
      margin: 0;
      padding: 0px;

     }

     body {
        background-color: aqua;

     }

     form {
        padding: 15px;
        width: 350px;
     }
     .container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
     }

     form {
        width: 350px;
     }

     input {
        width: 100%;
     }



 </style>
<body>
    <div class="container">
        <form action="" method="get">
            <label for="">nome</label>
            <input type="text" name="nome" id="">

            <label for="materia">materia</label>
            <input type="text" name="materia" id="">

            <label for="n1">nota 1</label>
            <input type="number" name="n1" id="">

            <label for="n2">nota 2</label>
            <input type="number" name="n2" id="">

            <label for="n3">nota 3</label>
            <input type="number" name="n3" id="">

            <label for="n4">nota 4</label>
            <input type="number" name="n4" id="">

            <button type="submit">enviar</button>
        </form>

        <div class="resultado">
            <?php
            echo "<div class='nome'>$nome</div>";
            echo "<div class='materia'>$materia</div>";
            echo "<div class='media'>$media</div>";

            ?>
        </div>
    </div>
    
</body>
</html>