<?php
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_cliente'])){
        $id_cliente = $_POST['id_cliente'];

        $delete = "DELETE FROM cliente WHERE id_cliente = :id_cliente";
        $stmt = $conexao->prepare($delete);
        $stmt->bindParam(':id_cliente', $id_cliente);

        if ($stmt->execute()){
            $mensagem = "Cliente vai ter que torcer pro Santos!!!";
        }else{
            $mensagem = "O cliente se recusa a torcer pro Santos!!!";
        }
    }

    $sql = "SELECT id_cliente, nome_cliente FROM cliente";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $clientes = $stmt->fetchALL();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (!empty($mensagem)):
    ?>
    <p><?= $mensagem ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <select name="id_cliente">
            <option value="">Selecione um cliente que vai torcer pro Santos</option>

            <?php foreach($clientes as $cliente): ?>
                <option value="<?= $cliente ['id_cliente']; ?>">
                    <?= $cliente ['nome_cliente']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" onclick="return confirm('Quer fazer esse cliente torcer pro Santos ?')">Fazer o cliente torcer pro Santos</button>
    </form>
</body>
</html>