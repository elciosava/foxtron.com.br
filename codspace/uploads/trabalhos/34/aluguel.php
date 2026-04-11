<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_cliente = $_POST['id_cliente'];
    $id_carro = $_POST['id_carro'];
    

    $sql = "INSERT INTO aluguel (id_cliente, id_carro)
            VALUES (:id_cliente, :id_carro)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->bindParam(':id_carro', $id_carro);

    if ($stmt->execute()){
        header("Location:aluguel.php");
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
   <form action="" method="post">
   <div class="container">
    <label for="id_carro">Carro</label>
    <select name="id_carro" id="">
        <?php
            $sqlcarro = "SELECT * FROM carros";
            $stmtcarro = $conexao->prepare ($sqlcarro);
            $stmtcarro->execute();

            while($carros = $stmtcarro->fetch( PDO::FETCH_ASSOC)){
                echo "<option value='{$carros['id']}'>{$carros['marca']}</option>";
            }
        
        ?>
        </select>    

    <label for="id_cliente">Cliente</label>
    <select name="id_cliente" id="">
        <?php
            $sqlcliente = "SELECT * FROM clientes";
            $stmtcliente = $conexao->prepare($sqlcliente);
            $stmtcliente->execute();

            while($clientes = $stmtcliente->fetch( PDO::FETCH_ASSOC)){
                echo "<option value='{$clientes['id']}'>{$clientes['nome']}</option>";
            }
        ?>
        
</select>   
            

    <button Type="submit">Enviar</button>
</div>
</form>


    
   
</body>
</htm