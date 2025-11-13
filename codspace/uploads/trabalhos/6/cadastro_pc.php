<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = $_POST['numero'];
    $lado = $_POST['lado'];
    $processador = $_POST['processador'];
    $memoria = $_POST['memoria'];
    $placa = $_POST['placa'];

   
    $sql = "INSERT INTO computadores (numero, lado, processador, memoria, placa)
            VALUES (:numero, :lado, :processador, :memoria, :placa)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':lado', $lado);
    $stmt->bindParam(':processador', $processador);
    $stmt->bindParam(':memoria', $memoria);
    $stmt->bindParam(':placa', $placa);
     
    if ($stmt->execute()) {
        header("Location:cadastro_pc.php");
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
            padding: 0;
            margin: 0;
        }

        form {
            width: 350px;
        }
        h2 {
            text-align: center;
            color: rgba(38, 83, 233, 1);
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        body {
            background: linear-gradient(to right, rgba(27, 50, 114, 1), rgba(126, 158, 218, 1));
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
        .form-box {
            background-color: rgba(255, 255, 255, 0.83);
            border: 3px solid rgba(38, 83, 233, 1);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px;
        }

        button {
            background-color: rgba(38, 83, 233, 1);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
            margin-top: 2px;
        }
        button:hover {
            background-color: rgba(47, 127, 151, 1);
        }
        .cabecalho {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;
            width: 750px;
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
         header {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        li {
            margin: 0 10px;
            width: 150px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
    </style>
</head>
<body>
     <header>
        <nav>
            <ul>
                
                <li><a href="cadastro_aluno.php"><button>Alunos</button></a></li>  
                <li><a href="cadastro_reserva.php"><button>Reservas</button></a></li>
                
            </ul>
        </nav>
    </header>
    <div class="container">
            <div class="form-box">
                <h2>Cadastre Seu PC</h2>
                <form action="" method="post">
                    <label for="numero">Número do Seu PC:</label>
                    <input type="text" name="numero" id="">

                    <label for="lado">Lado Que seu PC Está:</label>
                    <input type="text" name="lado" id="">

                    <label for="processador">Processador do Seu PC:</label>
                    <input type="text" name="processador" id="">

                    <label for="memoria">Memória do Seu PC:</label>
                    <input type="text" name="memoria" id="">

                    <label for="placa">Placa de Vídeo do Seu PC:</label>
                    <input type="text" name="placa" id="">

                    <button type="submit">Salvar</button>
                </form>
            </div>
        </div>
</body>
</html>