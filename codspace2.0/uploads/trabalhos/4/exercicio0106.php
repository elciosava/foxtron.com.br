<?php
    $nome =$_GET['nome'];
    $email=$_GET['email'];
     $matéria=$_GET['matéria'];

      $n1=$_GET['n1'];
      $n2=$_GET['n2'];
      $n3=$_GET['n3'];
      $n4=$_GET['n4'];
      $media = ($n1 + $n2+ $n3 + $n4)/4;
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
            padding:0px;
        }

        body{
            background-color: green;
        }

        header{
            background: green;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80px;
        }

        .container{
            display: flex;
            background-color: yellow;
            align-items: center;
            flex-direction: column;
        }

        form{
            width: 350px;
        }

        input{ 
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h2>Matéria e média</h2>
    </header>
    <div class="container">
       <form action="" method="get">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="">

        <label for="email">Email:</label>
        <input type="email" name="email" id="">

        <label for="matéria">matéria:</label>
        <input type="text" name="matéria" id="">

        <label for="n1">nota1:</label>
        <input type="number" name="n1" id="">

        <label for="n2">nota2:</label>
        <input type="number" name="n2" id="">

        <label for="n3">nota3:</label>
        <input type="number" name="n3" id="">

        <label for="n4">nota 4:</label>
        <input type="number" name="n4" id="">

        <button type="submit">Enviar</button>
       </form>

       <div class="resultado">
        <?php
        echo "<div class='nome'> $nome</div>";

        echo "<div class='email'> $email</div>";
        echo "<div class='media'> $media</div>";
        echo "<div class='matéria'> $matéria</div>";
        ?>
       </div>
    </div>
</body>
</html>