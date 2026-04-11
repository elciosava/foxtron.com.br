<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_cliente = $_POST['id_cliente'];
    $id_carros= $_POST['id_carros'];
   
           $sql = "INSERT INTO aluguel (id_cliente, id_carro)
        VALUES (:id_cliente, :id_carro)";

        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->bindParam(':id_carro', $id_carros);
        
        if($stmt->execute()){
            header("Location:aluguel.php");
        }else{ 
              echo "<p style= 'color:red;'>Deu ruim!!</p>";
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
            <label for="id_carros">Carros</label>
            <select name="id_carros" id="">
                <?php
                $sqlcarro = "SELECT * FROM `carros`";
                $stmtcarro = $conexao->prepare($sqlcarro);
                $stmtcarro->execute();

                while($carros = $stmtcarro->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$carros['id']}'>{$carros['nome']}</option>";
                }
                ?>
            </select>
        <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>