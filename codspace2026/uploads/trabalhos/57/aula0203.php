<?php
ini_set("display_errors",0);
    
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    echo $nome;
    echo $cpf;
    echo $cidade;
    echo $estado;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="nome">nome</label>
            <input type="text" name="nome" id="">

            <label for="cpf">CPF</label>
            <input type="number" name="cpf" id="">

            <label for="cidade">cidade</label>
            <select name="cidade" id="">
                <option value="porto união">porto união</option>
                <option value="união da vitoria">união da vitoria</option>
                <option value="bituruna">bituruna</option>
            </select>
            <select name="estado" id="">
                <option value="SC">SC</option>
                <option value="PR">PR</option>
            </select>
            <button type="submit">enviar</button>
        </form>
    </div>
    <div class="resultado">
        <?php
        echo $nome . "</br>";
        echo $cpf . "/br>";
        echo $cidade . "/br>";
        echo $estado . "/br>";
        ?>
    </div>
</body>
</html>