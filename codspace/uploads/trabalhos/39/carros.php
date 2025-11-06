<?php
    include 'conexao.php';

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];
    $cor = $_POST['cor'];
  

    $sql = "INSERT INTO carros (modelo, placa, cor)
            VALUES (:modelo, :placa, :cor)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':modelo', $modelo);
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':cor', $cor);

    
    if ($stmt->execute()){
        header("location:carros.php");
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
    <title>CARROS</title>
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
           background: linear-gradient(to top, #eb1a59ff, #f7f7f7ff);
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
            
            background-color: rgba(131, 99, 141, 1);
            border: 2px solid rgba(0, 0, 0, 1); 
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(100, 24, 145, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgba(245, 171, 255, 0.51);
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
    <div class="container">
        <div class="form-box">
        <form action="" method="post">
             <h2>Cadastro De Carros</h2>

        <label for="modelo">Modelo</label>
        <input type="text" name="modelo" id="">

        <label for="placa">Placa</label>
        <input type="text" name="placa" id="">

        <label for="cor">Cor</label>
        <input type="color" name="cor" id="">
        
        <button type="submit">Salvar</button>
    
    </form>
</div>
</div>
</body>
</html>