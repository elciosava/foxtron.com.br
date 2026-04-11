<?php

include 'conexao.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $id_cliente = $_POST['id_cliente'];

    $sql = "INSERT INTO produto (nome, preco, quantidade, id_cliente)
            VALUES (:nome, :preco, :quantidade, :id_cliente)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->execute();
}

$sql_cliente = "SELECT id_cliente, nome_cliente FROM cliente";
$stmt_cliente = $conexao->prepare($sql_cliente);
$stmt_cliente->execute();
$clientes = $stmt_cliente->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produto</title>
</head>

<body>
    <form action="" method="post" class="produto">

        <select name="id_cliente" id="">
            <?php foreach ($clientes as $cliente): ?>
                <option value="<?= $cliente['id_cliente']; ?>">
                    <?= $cliente['nome_cliente']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="">

        <label for="preco">Preço</label>
        <input type="text" name="preco" id="">

        <label for="quantidade">Quantidade</label>
        <input type="text" name="quantidade" id="">

        <button type="submit">Enviar</button>
    </form>
</body>

</html>