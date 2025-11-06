<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <div class="container">
            <form action="" method="post">
                <label for="id_cliente">Cliente</label>
                <select name="id_cliente" id="">
                    <?php
                      $sqlcliente = "SELECT * FROM `clientes`";
                      $stmtcliente = $conexao->prepare($sqlcliente);
                      $stmtcliente->execute();

                      while($clientes = $stmtcliente->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$clientes['id']}'>{$clientes['nome']}</option>";
                      }
                      ?>
                </select>

                <label for="id_carro">Carro</label>
                <select name="id_carro" id="">
                    <?php
                      $sqlcarros = "SELECT * FROM `carros`";
                      $stmtcarros = $conexao->prepare($sqlcarros);
                      $stmtcarros->execute();

                      while($carros = $stmtcarros->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$carros['id']}'>{$carros['modelo']}</option>";
                      }
                      ?>
                </select>
            <button type="submit">Salva</button>

            </form>
        </div>
    </section>
</body>
</html>