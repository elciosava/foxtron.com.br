<?php
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $marca = $_POST['marca'];
            $placa = $_POST['placa'];
            $cor = $_POST['cor'];

            $sql = "INSERT INTO carros (marca, placa, cor) VALUES (:marca, :placa, :cor)";
                 
            $stmt = $conexao->prepare( $sql);
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':placa', $placa);
            $stmt->bindParam(':cor', $cor);

            if ($stmt->execute()) {
                header("Location:carros.php");
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
        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" required>

        <label for="placa">Placa:</label>
        <input type="text" name="placa" id="placa" required>

        <label for="cor">Cor:</label>
        <input type="text" name="cor" id="cor" required>

        <button type="submit">Adicionar Carro</button>
    </form>
</body>
</html>