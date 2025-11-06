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
        echo "não deu certo!!";
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
    <div class="contaier">
        <form action="" method="post">
           <label for="id_cliente">Clientes:</label>
                    <select name="id_cliente" id="">
                    <?php
                       $sqlclientes = "SELECT * FROM `clientes`";
                       $stmtclientes = $conexao->prepare($sqlclientes);
                       $stmtclientes->execute();

                        while($cliente = $stmtclientes->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$cliente['id']}'>{$cliente['nome']}</option>";
                        }
                    ?>
                    </select>
                    
                    <label for="id_carro">Carros:</label>
                    <select name="id_carro" id="">
                    <?php
                       $sqlcarros = "SELECT * FROM `carros`";
                       $stmtcarros = $conexao->prepare($sqlcarros);
                       $stmtcarros->execute();

                       while($carros = $stmtcarros->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$carros['id']}'>{$carros['marca']} | {$carros['placa']} | {$carros['cor']}</option>";
                        }
                    ?>
                    </select>
            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>