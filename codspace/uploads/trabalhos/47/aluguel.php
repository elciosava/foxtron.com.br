<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $id_carro = $_POST['id_carro'];
   
    $sql = "INSERT INTO aluguel (id_cliente, id_carro) VALUES (:id_cliente, :id_carro)";


    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->bindParam(':id_carro', $id_carro);
     
    if ($stmt->execute()) {
        header("Location:aluguel.php");
        exit;
    } else {
        echo "deu eerado";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo2.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="id_cliente">ID do Cliente:</label>
        <select name="id_cliente" id="">
            <?php
            $sql = "SELECT id, nome FROM clientes";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($clientes as $cliente) {
                echo "<option value='" . $cliente['id'] . "'>" . $cliente['nome'] . "</option>";
            }
            ?>
        </select>

        <label for="id_carro">ID do Carro:</label>
        <select name="id_carro" id="">
            <?php
            $sql = "SELECT id, marca FROM carros";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($carros as $carro) {
                echo "<option value='" . $carro['id'] . "'>" . $carro['marca'] . "</option>";
            }
            ?>
        </select>

        <button type="submit">salvar</button>
    </form>

    
</body>
</html>