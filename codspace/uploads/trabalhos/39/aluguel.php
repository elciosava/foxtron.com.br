<?php
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_clientes = $_POST['id_cliente'];
    $id_carros = $_POST['id_carro'];
  

    $sql = "INSERT INTO aluguel (id_cliente, id_carro) 
            VALUES (:id_clientes, :id_carros)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_clientes', $id_clientes);
    $stmt->bindParam(':id_carros', $id_carros);
    
    if ($stmt->execute()){
        header("location:aluguel.php");
        exit;
    }else{
        echo "Não deu boa!";
    }
    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALUGUEL</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        } 

         header {
            height:50px;
        }

        html {
            font-family: Segoe UI;
           background: linear-gradient(to top, #5d5ebdff, #e68ba2ff);
        }  

         form {
            width: 400px;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 30px;
            height: 50px;
        }
                                         
        .container {
            display: flex;
            justify-content: center;
            align-items: center;           
        }

        input, select {
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
             height: 100vh; 
        }

        .cabecalho{
            display: flex;
            padding: 5px 15px;
            border: solid black 1px ;
            width: 550px;
        }

        .linha {
            display: flex;
            border: solid  black 1px;
            padding: 5px 15px;
        }

        .cel_cabecalho {
            width: 170px;
        }
        .form-box {
            
            background-color: rgba(227, 159, 248, 1);
            border: 2px solid rgba(0, 0, 0, 1); 
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(175, 209, 248, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgba(82, 72, 170, 0.88);
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
            margin-top: 4px;
        }

        button:hover {
            background-color: rgba(64, 80, 218, 1);
        }

        h2 {
            text-align: center;
            color: black;
            margin-bottom: 20px;
            font-size: 1.9rem;
        }
 </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <div class="form-box">
                <h2>Aluguel De Clientes</h2>


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

                <label for="id_carro">Carros</label>
                <select name="id_carro" id="">

                <?php
                $sqlcarro = "SELECT * FROM `carros`";
                $stmtcarro = $conexao->prepare($sqlcarro);
                $stmtcarro->execute();

                while($carros = $stmtcarro->fetch(PDO::FETCH_ASSOC)){
                echo "<option value='{$carros['id']}'>{$carros['modelo']}</option>";
                    }

                ?>
                </select>
                

                <button class="submit">Salvar</button>
            </form>
          </div>
        </div>
    </section>
</body>
</html>