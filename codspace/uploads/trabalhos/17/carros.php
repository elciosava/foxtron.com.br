<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $marca = $_POST['marca'];
    $placa = $_POST['placa'];
    $cor = $_POST['cor'];

    $sql = "INSERT INTO carros (marca, placa, cor)
            VALUES (:marca, :placa, :cor)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':cor', $cor);
    $stmt->execute();

     echo "Registrado com sucesso!";
}else{
    echo "Não foi registrado!";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="">

            <label for="placa">Placa</label>
            <input type="text" name="placa" id="">

            <label for="cor">Cor</label>
            <input type="color" name="cor" id="">

            <button type="submit">Enviar</button>
        </div>
    </form>
</body>
</html>