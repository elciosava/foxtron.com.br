<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    

    $sql = "INSERT INTO clientes (nome, cpf)
    Values (:nome, :cpf)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome',$nome);
    $stmt->bindParam(':cpf',$cpf);
    
    
    if ($stmt->execute()){
     header("location:clientes.php");
     exit;
    }else{
        echo"Não Deu Boa!!"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
     <style>
        /* Estilo geral da página */
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container do formulário */
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 350px;
            text-align: center;
            animation: fadeIn 0.7s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            margin-bottom: 25px;
            color: #333;
        }

        /* Labels */
        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
            color: #555;
            font-weight: 500;
        }

        /* Inputs */
        input[type="text"],
        input[type="color"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #2a5298;
            outline: none;
        }

        /* Botão */
        button {
            background: #2a5298;
            color: white;
            border: none;
            padding: 12px 20px;
            width: 100%;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #1e3c72;
        }

        /* Efeito no input color */
        input[type="color"] {
            height: 40px;
            cursor: pointer;
            border: none;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="cpf">Cpf</label>
            <input type="text" name="cpf" id="">

            <button type="submit">Salvar</button>
        </div>
    </form>
</body>
</html>