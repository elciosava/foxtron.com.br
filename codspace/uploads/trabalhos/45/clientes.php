<?php
  include "conexao.php";

    $sql = "SELECT * FROM `clientes`";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

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
        <form action="grava_clientes.php" method="post">
            <label for="nome">Nome</label>
              <input type="text" name="nome" id="">

            <label for="cpf">CPF</label>
              <input type="text" name="cpf" alt="">

            <button type="submit">Salva</button>
        </div>
        </form>
    </section>
</body>
</html>