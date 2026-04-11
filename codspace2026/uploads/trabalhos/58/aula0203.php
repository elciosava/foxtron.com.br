<?php
    ini_set("display_errors",0);

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hog Riders</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="cpf">CPF</label>
            <input type="number" name="cpf" id="">

            <label for="cidade">Cidade</label>
            <select name="cidade" id="">
                <option value="Porto União">Porto União</option>
                <option value="União da Vitória">União da Vitória</option>
                <option value="Porto Alegre">Porto Alegre</option>
                <option value="Nova Granada">Nova Granada</option>
            </select>

            <label for="estado">Estado</label>
            <select name="estado" id="">
                <option value="SC">SC</option>
                <option value="PR">PR</option>
                <option value="RS">RS</option>
                <option value="SP">SP</option>
            </select>

            <button type="submit">Enviar</button>

        </div>
    </form>

    <div class="resultado">
        <?php
            echo $nome . "</br>";
            echo $cpf . "</br>";
            echo $cidade . "</br>";
            echo $estado . "</br>";
        ?>
    </div>
</body>
</html>