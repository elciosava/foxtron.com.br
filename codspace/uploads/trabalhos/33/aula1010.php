<?php
$local = 'localhost';
$banco = 'isabele';
$usuario = 'root';
$senha = '';

$conn = new mysqli($local, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO endereco (nome, tipo, numero, bairro, cidade, estado)
            VALUES ('$nome', '$tipo', '$numero', '$bairro', '$cidade', '$estado')";

    
}   
?>

 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Endereço</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #fff0f5;
            font-family: Arial, sans-serif;
        }

        .container {
            
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(95, 0, 0, 1);
            background-color: #fff;
            width: 300px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input, select, button {
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 15px;
            background-color: pink;
            border: none;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: hotpink;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="tipo">Tipo</label>
            <select name="tipo" required>
                <option value="travessa">Travessa</option>
                <option value="rua">Rua</option>
                <option value="beco">Beco</option>
                <option value="avenida">Avenida</option>
                <option value="alameda">Alameda</option>
            </select>

            <label for="nome">Nome</label>
            <input type="text" name="nome" required>

            <label for="numero">Número</label>
            <input type="number" name="numero" required>

            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" required>

            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" required>

            <label for="estado">Estado</label>
            <select name="estado" required>
                <option value="PR">PR</option>
                <option value="SC">SC</option>
            </select>

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>

