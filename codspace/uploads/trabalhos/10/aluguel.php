<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $id_carro = $_POST['id_carro'];

    $sql_inserir = "INSERT INTO aluguel (id_cliente, id_carro) 
                    VALUES (:id_cliente, :id_carro)";
    
    $stmt_inserir = $conexao->prepare($sql_inserir);
    $stmt_inserir->bindParam(':id_cliente', $id_cliente);
    $stmt_inserir->bindParam(':id_carro', $id_carro);
    $stmt_inserir->execute();
    
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluguel</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="id_cliente">Cliente</label>
            <select name="id_cliente" id="id_cliente" required>
                <option value="">Selecione um cliente</option>
                <?php
                $sql_clientes = "SELECT * FROM `clientes`";
                $stmt_clientes = $conexao->prepare($sql_clientes);
                $stmt_clientes->execute();

                while ($clientes = $stmt_clientes->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$clientes['id']}'>{$clientes['nome']}</option>";  
                }
                ?>
            </select>
        </div>

        <div>
            <label for="id_carro">Carro</label>
            <select name="id_carro" id="id_carro" required>
                <option value="">Selecione um carro</option>
                <?php
                $sql_carros = "SELECT * FROM `carros`";
                $stmt_carros = $conexao->prepare($sql_carros);
                $stmt_carros->execute();

                while ($carros = $stmt_carros->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$carros['id']}'>{$carros['carro']}</option>";  
                }
                ?>
            </select>
        </div>

        <button type="submit">Cadastrar Aluguel</button>
    </form>
</body>
</html>