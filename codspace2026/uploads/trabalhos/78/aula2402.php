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
    <link rel="shortcut icon" type="imagex/png" href="img/icon.png">
    <title>Aula 24/02</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .container {
            width: 400px;
            background: rgb(0, 85, 255);
            padding: 10px;
        }
        input {
            width: 400px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
            <form action="" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="">

                <label for="cargo">Cargo</label>
                <input type="text" name="cargo" id="">

                <label for="salario">Salario</label>
                <input type="text" name="salario" id="">

                <button type="submit">Enviar</button>
            </form>
    </div>
    <div class="resultado">
        <?php
            echo "Nome: " . $nome . "<br>";
            echo "Sobrenome: " . $sobrenome . "<br>";
            echo "Cargo: " . $cargo . "<br>";
            echo "Salario: " . $salario . "<br>";
        ?>
    </div>
</body>
</html>