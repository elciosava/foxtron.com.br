<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $carro = $_POST['carro'];
    $cor = $_POST['cor'];

    $sql_inserir = "INSERT INTO carros (carro, cor) 
                    VALUES (:carro, :cor)";
    
    $stmt_inserir = $conexao->prepare($sql_inserir);
    $stmt_inserir->bindParam(':carro', $carro);
    $stmt_inserir->bindParam(':cor', $cor);
    $stmt_inserir->execute();
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carros</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="carro">Carro</label>
            <input type="text" name="carro" id="carro" required>

            <label for="cor">Cor</label>
            <input type="color" name="cor" id="cor" required>

            <button type="submit">Salvar</button>
        </form>
    </div>
    
</body>
</html>