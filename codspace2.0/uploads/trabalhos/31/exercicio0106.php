<?php
    $nome=$_GET['nome'];
    $materia=$_GET['materia'];
    $nota1=$_GET['nota1'];
    $nota2=$_GET['nota2'];
    $nota3=$_GET['nota3'];
    $nota4=$_GET['nota4'];
    $media = ($nota1+$nota2+$nota3+$nota4)/4;
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
        body{
            background:#23d613;
        }
        form{
            width: 300px;
            padding: 15px;
        }
        input{
            width: 100%;
        }
        .container{
            justify-content: center;
            align-items: center;
            display: flex;
            flex-direction: column;
        }
        header{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80px;
            background: #00af00;
            font-size: larger;
            font-family: 'Segoe UI';
        }
    </style>
</head>
<body>
    <header>
        <h2>Matéria e Média</h2>
    </header>
    <div class="container">
        <form action="" method="get">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="">

        <label for="materia">Matéria:</label>
        <input type="text" name="materia" id="">

        <label for="nota1">Nota 1:</label>
        <input type="number" name="nota1" id="">

        <label for="nota2">Nota 2:</label>
        <input type="number" name="nota2" id="">

        <label for="nota3">Nota 3:</label>
        <input type="number" name="nota3" id="">

        <label for="nota4">Nota 4:</label>
        <input type="number" name="nota4" id="">

        <button type="submit">Enviar</button>
        </form>
        <div class="resultados">
            <?php
                echo "<div class='nome'>$nome</div>";
                echo "<div class='materia'>$materia</div>";
                echo "<div class='media'>$media</div>";
                
            ?>
        </div>
    </div>
</body>
</html>