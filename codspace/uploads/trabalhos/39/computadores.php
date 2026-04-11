<?php
    include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $placa = $_POST['placa'];
    $processador = $_POST['processador'];
    $memoria = $_POST['memoria'];
    $lado = $_POST['lado'];
    $numero = $_POST['numero'];
  

    $sql = "INSERT INTO computadores (placa, processador, memoria, lado, numero)
            VALUES (:placa, :processador, :memoria, :lado, :numero)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':processador', $processador);
    $stmt->bindParam(':memoria', $memoria);
    $stmt->bindParam(':lado', $lado);
    $stmt->bindParam(':numero', $numero);
    
    if ($stmt->execute()){
        header("location:computadores.php");
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
    <title>Computadores</title>
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
           background: linear-gradient(to left, #00fff2ff, #ffffffff);
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
            
            background-color: rgba(111, 206, 182, 1);
            border: 2px solid rgba(0, 0, 0, 1); 
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgba(162, 235, 223, 1);
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
            background-color: rgba(99, 197, 181, 1);
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
   <nav>
    <ul>
       <li> <a href="reserva.php"><button>Reserva</button></a></li>
    </ul>
   </nav> 
    <div class="form-box">
    <form action="" method="post">
        <h2>Cadastrar Computadores</h2>


        <label for="placa">Placa</label>
        <input type="text" name="placa" id="">

        <label for="processador">Processador</label>
        <input type="text" name="processador" id="">

        <label for="memoria">Memoria</label>
        <input type="text" name="memoria" id="">

        <label for="lado">Lado</label>
        <input type="text" name="lado" id="">

        <label for="numero">Numero</label>
        <input type="text" name="numero" id="">

        <button type="submit">Salvar</button>

        
    </form>
</div>

    
    
</body>
</html>