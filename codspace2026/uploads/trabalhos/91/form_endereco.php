<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $id_cliente = $_POST['id_cliente'];

    $sql = "INSERT INTO endereco (rua, numero, bairro, estado, id_cliente)
            VALUES (:rua, :numero, :bairro, :estado, :id_cliente)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':rua', $rua);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->execute();
}
$sql_cliente = "SELECT id_cliente, nome_cliente FROM cliente";
$stmt_cliente = $conexao->prepare($sql_cliente);
$stmt_cliente->execute();
$clientes = $stmt_cliente->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Endereço</title>
</head>
<body>
    <form action="" method="post" class="endereco">

        <select name="id_cliente" required>
            <option value="">Selecione o cliente</option>
            <?php foreach ($clientes as $cliente): ?>
                <option value="<?= $cliente['id_cliente']; ?>">
                    <?= $cliente['nome_cliente']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="rua">Rua</label>
        <input type="text" name="rua" required>

        <label for="numero">Número</label>
        <input type="text" name="numero" required>

        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" required>

        <label for="estado">Estado</label>
        <input type="text" name="estado" required>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>