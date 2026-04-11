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
       <style>
 
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: "Poppins", Arial, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(135deg, #150435ff, #5641ccff);
}


form {
    width: 100%;
    max-width: 380px;
    background: #fff;
    padding: 30px 25px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

form:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}


input, select {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 18px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 15px;
    transition: border-color 0.3s, box-shadow 0.3s;
}


input:focus, select:focus {
    border-color: #0072ff;
}
</style>
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