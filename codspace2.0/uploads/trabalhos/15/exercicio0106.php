<?php
      $nome = $_GET['nome'];
      $materia = $_GET['materia'];
      $n1 = $_GET['n1'];
      $n2 = $_GET['n2'];
      $n3 = $_GET['n3'];
      $n4 = $_GET['n4'];
      $media = ($n1+$n2+$n3+$n4)/4;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0px;
            
            
        }

        body {
            background: cadetblue;
        }

        form {
            padding: 15px;
            width: 350px;
          

        }

        .container {
            justify-content: center;
            align-items: center;
            display: flex;
            flex-direction: column;
            
        }

        header {
            justify-content: center;
            align-items: center;
            display: flex;
            

            
        
        }
        input {
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h2>Materia e Media</h2>
    </header>
    <div class="container">
        <form action="" method="get">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

             <label for="materia">Materia</label>
            <input type="text" name="materia" id="">

             <label for="n1">Nota 1</label>
            <input type="number" name="n1" id="">

             <label for="n2">Nota 2</label>
            <input type="number" name="n2" id="">

             <label for="n3">Nota 3</label>
            <input type="number" name="n3" id="">

             <label for="n4">Nota 4</label>
            <input type="number" name="n4" id="">

            <button type="submit">Enviar</button>
            
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