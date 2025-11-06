<?php 
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marca = $_POST['marca'];
    $placa = $_POST['placa'];
    $cor = $_POST['cor'];

    $sql = "INSERT INTO carros (marca, placa, cor)
            VALUES (:marca, :placa, :cor)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':cor', $cor);
    $stmt->execute();

    echo "<div class='mensagem sucesso'>🛡️ Louvado seja! O registro da carruagem foi escrito nos pergaminhos reais!</div>";
} else {
    echo "<div class='mensagem erro'>💀 Ai de nós! O escriba tropeçou na pena e falhou em registrar a carruagem.</div>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Carruagens do Reino</title>
    <style>
        body {
            background: #f2e8c9 url('https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Medieval_parchment_background.jpg/800px-Medieval_parchment_background.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'UnifrakturCook', cursive;
            color: #3b2b1d;
            text-align: center;
            padding: 50px;
        }

        @import url('https://fonts.googleapis.com/css2?family=UnifrakturCook:wght@700&display=swap');

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px #c9a96b;
        }

        form {
            display: inline-block;
            background: rgba(255, 248, 220, 0.85);
            padding: 30px;
            border: 5px solid #5b3a1a;
            border-radius: 15px;
            box-shadow: 0 0 20px #3b2b1d;
            max-width: 400px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-size: 1.2em;
        }

        input[type="text"],
        input[type="color"] {
            width: 90%;
            padding: 10px;
            border: 2px solid #5b3a1a;
            border-radius: 8px;
            background-color: #fffaf0;
            font-size: 1em;
            margin-top: 5px;
        }

        button {
            margin-top: 20px;
            padding: 10px 25px;
            background-color: #7d5520;
            color: #fffaf0;
            font-size: 1.2em;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-family: 'UnifrakturCook', cursive;
        }

        button:hover {
            background-color: #9c6e2f;
        }

        .mensagem {
            font-family: 'UnifrakturCook', cursive;
            padding: 15px;
            margin: 20px;
            border: 3px solid #3b2b1d;
            border-radius: 10px;
            display: inline-block;
            background: #fff8dc;
        }

        .sucesso {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .erro {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>
    <h1>📜 Registro de Carruagens do Reino</h1>
    <form action="" method="post">
        <label for="marca">Marca da Carruagem</label>
        <input type="text" name="marca" id="marca" required>

        <label for="placa">Selo de Identificação</label>
        <input type="text" name="placa" id="placa" required>

        <label for="cor">Cor do Brasão</label>
        <input type="color" name="cor" id="cor" required>

        <button type="submit">🖋️ Registrar</button>
    </form>
</body>
</html>