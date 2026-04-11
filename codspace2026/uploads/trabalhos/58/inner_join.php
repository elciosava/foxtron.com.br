<?php

include 'conexao.php';

$sql = "SELECT c.nome_cliente, e.rua_endereco FROM `cliente` AS c
        INNER JOIN endereco AS e WHERE c.id_cliente = e.id_cliente";

$stmt = $conexao->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {

    echo "<div class='cabecalho'>";
    echo "<div class='cel_cabecalho'>Nome</div>";
    echo "<div class='cel_cabecalho'>Endereco</div>";
    echo "</div>";

while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='linha'>";
    echo "<div class='cel_cabecalho'>{$linha['nome_cliente']}</div>";
    echo "<div class='cel_cabecalho'>{$linha['rua_endereco']}</div>";
    echo "</div>";
  }
}

                $sql_cliente = "SELECT id_cliente, nome_cliente FROM cliente";

                $stmt = $conexao->prepare($sql_cliente);
                $stmt->execute();

                $cliente = $stmt->fetchALL(PDO::FETCH_ASSOC);

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

        .cabecalho{
            width: 500px;
            display: flex;
            background: #eb8b05;
        }

        .cel_cabecalho{
            width: 250px;
            border: 1px solid #9107e0;
            padding: 5px;
        }

        .linha{
            width: 500px;
            display: flex;
            background: #07a631;
        }

    </style>
</head>
<body>
    <form action="" method="post">

        <label for="nome">Nome:</label>
        <select name="id_cliente" id="">
            <?php foreach ($cliente as $cliente): ?>
            <option value="<?php $cliente['id_cliente']; ?>"><?php $cliente['nome_cliente']; ?></option>

        </select>
        <?php endforeach; ?>

        <input type="hidden" name="id_cliente">

        <label for="rua_endereco">Rua:</label>
        <input type="text" name="rua_endereco" id="">

        <button type="submit">Salvar</button>
    </form>
</body>
</html>