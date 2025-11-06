<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_carro = $_POST['id_carro'];
    $id_cliente = $_POST['id_cliente'];
    

    $sql = "INSERT INTO aluguel (id_carro, id_cliente)
            VALUES (:id_carro, :id_cliente)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_carro', $id_carro);
    $stmt->bindParam(':id_cliente', $id_cliente);
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
            <label for="id_cliente">Cliente</label>
            <select name="id_cliente" id="">
                <?php
                    $sqlcliente = "SELECT * FROM clientes";
                    $stmtcliente = $conexao->prepare($sqlcliente);
                    $stmtcliente->execute();

                    while($clientes = $stmtcliente->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$clientes['id']}'>{$clientes['nome']}</option>";
                    }
                ?>
            </select>
            <label for="id_carro">Carro</label>
            <select name="id_carro" id="">
                <?php
                    $sqlcarro = "SELECT * FROM carros";
                    $stmtcarro = $conexao->prepare($sqlcarro);
                    $stmtcarro->execute();

                    while($carros = $stmtcarro->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$carros['id']}'>{$carros['marca']} | {$carros['placa']}</option>";
                    }
                ?> 
            </select>

            <button type="submit">Enviar</button>
    </form>
</body>
</html>