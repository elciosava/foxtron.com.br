<?php
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complicado Isso Aí</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container{
            width: 400px;
            background: rgba(15, 184, 85, 1);
            padding: 10px;
        }

        input{
            width: 400px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="">

            <label for="sobrenome">Sobrenome:</label>
            <input type="text" name="sobrenome" id="">

            <label for="cargo">Cargo que trabalha:</label>
            <input type="text" name="cargo" id="">

            <label for="salario">Salário:</label>
            <input type="number" name="salario" id="">

            <button type="submit">Enviar</button>

        </form>
    </div>
    <div class="resultado">
        <?php
            echo $nome . "</br>";
            echo $sobrenome . "</br>";
            echo $cargo . "</br>";
            echo $salario . "</br>";
        ?>
    </div>
</body>
</html>