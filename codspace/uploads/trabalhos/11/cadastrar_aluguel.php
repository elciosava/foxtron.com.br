<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_clientes = $_POST['id_clientes'];
    $id_carros = $_POST['id_carros'];

    $sql = "INSERT INTO aluguel (id_clientes, id_carros) VALUES (:id_clientes, :id_carros)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_clientes', $id_clientes);
    $stmt->bindParam(':id_carros', $id_carros);
     
    if ($stmt->execute()) {
        header("Location:cadastrar_aluguel.php");
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
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: linear-gradient(135deg, #e0f7fa, #e3f2fd);
        font-family: "Poppins", "Inter", Arial, sans-serif;
        color: #333;
    }

    form {
        width: 100%;
        max-width: 460px;
        background: #ffffff;
        padding: 35px 30px;
        border-radius: 18px;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    form:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    }

    input, select {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 14px;
        margin-bottom: 20px;
        border: 1px solid #cfd8dc;
        border-radius: 10px;
        font-size: 15px;
        background: #fafafa;
        transition: all 0.25s ease;
    }

    input:focus, select:focus {
        border-color: #0288d1;
        background: #ffffff;
        box-shadow: 0 0 6px rgba(2, 136, 209, 0.3);
        outline: none;
    }

    button {
        background: linear-gradient(90deg, #0288d1, #00bcd4);
        width: 100%;
        height: 48px;
        border: 0;
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 188, 212, 0.3);
    }

    button:active {
        transform: translateY(0);
        box-shadow: none;
    }

    input::placeholder {
        color: #9e9e9e;
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #0288d1;
        font-weight: 700;
    }
</style>
</head>
<body>
    <div class="contaier">
        <form action="" method="post">
           <label for="id_clientes">Clientes:</label>
                    <select name="id_clientes" id="">
                    <?php
                       $sqlclientes = "SELECT * FROM `clientes`";
                       $stmtclientes = $conexao->prepare($sqlclientes);
                       $stmtclientes->execute();

                        while($clientes = $stmtclientes->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$clientes['id']}'>{$clientes['nome']}</option>";
                        }
                    ?>
                    </select>
                    
                    <label for="id_carros">Carros:</label>
                    <select name="id_carros" id="">
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