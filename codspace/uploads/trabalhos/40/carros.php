<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $modelo = $_POST['modelo']; 
     $placa = $_POST['placa'];  
      $cor = $_POST['cor'];  


      $sql = "INSERT INTO carros (modelo, placa, cor)
    VALUES (:modelo, :placa, :cor)";


    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':modelo', $modelo);
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':cor', $cor);

   

    if ($stmt->execute()) {
        header("Location:carros.php");
        exit;
    }else{
        echo "não deu certo!";
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
            padding:0;
            margin:0;
        }
        form {
            width: 350px;
        }

        h2 {
            text-align: center;
            color: #7a0000ff;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        body {          
            background: linear-gradient(to top, rgba(139 0 0), rgba(165 42 42));
            font-family: Verdana;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        input,select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 5px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .cabecalho  {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;  
            width: 1000px; 
        }
        .cel_cabecalho {
            width: 180px;
            margin: 5px; 
        }
        .linha {
            display: flex;
            border: solid 1px black;
            padding: 5px 10px;
        }
        .resultado {
            margin-top: 20px;
        }
         .form-box {
            background-color: rgba(255, 255, 255, 0.83); 
            border: 2px solid rgba(0, 0, 0, 1); 
            border-radius: 10px; 
            padding: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgba(139 0 0);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
          
        }
        button:hover {
            background-color: rgba(255, 1, 39, 1);
        }

    </style>
</head>
<body>
    <div class="container">
         <div class="form-box">
        <h2>Cadastrar Carro</h2>
        <form action="" method="post">

        <label for="modelo">Modelo do Carro</label>
        <input type="text" name="modelo" id="">

        <label for="placa">Placa do Carro</label>
        <input type="text" name="placa" id="">

        <label for="cor">Cor do Carro</label>
        <input type="color" name="cor" id="">

        <button type="submit">Salvar</button>

        </form>
    </div>
</body>
</html>