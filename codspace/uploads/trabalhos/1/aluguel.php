<?php
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $marca = $_POST['marca'];
        $placa = $_POST['placa'];
        $cor = $_POST['cor'];

    $sql = "INSERT INTO carros (modelo, placa, cor)
            VALUES (:marca, :placa, :cor)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':cor', $cor);

    if ($stmt->execute()){
        header("Location:carros.php");
        exit;
    }else{
        echo "não deu boa!";
    }
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
            
            <label for="placa">Carro</label>
            <select name="id_carro" id="">
                <?php
                    $sqlcliente = "SELECT * FROM `carros`";
                    $stmtcliente = $conexao->prepare($sqlcliente);
                    $stmtcliente->execute();

                ?>
            </select>

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>