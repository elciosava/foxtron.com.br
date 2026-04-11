<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $numero = $_POST['numero'];
    $processador = $_POST['processador'];
    $memoria = $_POST['memoria'];
    $armazenamento = $_POST['armazenamento'];

    $sql = "INSERT INTO computador (numero, processador, memoria, armazenamento)
             VALUES (:numero, :processador, :memoria, :armazenamento)";

    $stmt = $conexao->prepare($sql);   
    $stmt->bindParam('numero', $numero);
    $stmt->bindParam('processador', $processador);
    $stmt->bindParam('memoria', $memoria);
    $stmt->bindParam('armazenamento', $armazenamento);

    if ($stmt->execute()){
        header("Location:aluno.php");
        exit;
    }else{
        echo "A conexão não procedeu. A tesoura comeu!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Gemer</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #03c403ff 0%, #b3c704ff 50%, #0044ffff 100%);
            color: #fff;
        }

    </style>
</head>
<body>

    <header>
        <nav>
          <ul>

            <h2><li><a href="menu.php"button type="submit">Voltar</li></button></a></h2>

          </ul>
        </nav>
    </header>

    <div class="container">
        <form action="" method="post">
        
            <label for="numero">Numero:</label>
            <input type="number" name="numero" id="">

            <label for="processador">Processador:</label>
            <input type="text" name="processador" id="">
            
            <label for="memoria">Memoria:</label>
            <select name="memoria" id="">
                <option value="8gb">8 GB</option>
                <option value="16gb">16 GB</option>
                <option value="32gb">32 GB</option>
                <option value="64gb">64 GB</option>
                <option value="128gb">128 GB</option>
            </select>

            <label for="armazenamento">Armazenamento:</label>
            <select name="armazenamento" id="">
                <option value="128gb">128 GB</option>
                <option value="254gb">254 GB</option>
                <option value="480gb">480 GB</option>
                <option value="512gb">512 GB</option>
                <option value="1t">1 Tera</option>
            </select>

            <button type="submit">Enviar</button>
        
        </form>
    </div>
</body>
</html>