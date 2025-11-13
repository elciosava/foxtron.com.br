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

   

    if ($stmt->execute()) {
        header("Location:computadores.php");
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
            color: #FFB6C1;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        body {          
            background: linear-gradient(to top, rgba(255 245 238), rgba(255 192 203));
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
            background-color: rgb(255,192,203);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
          
        }
        button:hover {
            background-color: rgb(255,182,193);
        }

            li {
            display: inline-block;
            margin: 0 10px;
        }

    </style>
</head>
<body>
   <div class="container">
     <div class="form-box">
    <h2>Reserve um Computador</h2>
    <form action="" method="post">
        <label for="placa">Placa de Video</label>
        <input type="text" name="placa" id="">

        <label for="processador">Processador</label>
        <input type="text" name="processador" id="">
        
        <label for="memoria">Memoria</label>
        <input type="text" name="memoria" id="">

        <label for="lado">Lado da sala</label>
        <input type="text" name="lado" id="">

        <label for="numero">Numero</label>
        <input type="text" name="numero" id="">

        <button type="submit">Salvar</button>
    </form>
   </div>

   <header>
    <nav>
        <ul>
               <li>
                    <a href="alunos.php"><button>Alunos</button></a>
                </li>

                  <li>
                      <a href="reserva_computadores.php"><button>Reserva</button></a>
                </li>
        </ul>
    </nav>
   </header>
</body>
</html>