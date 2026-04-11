<?php
include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

    
    $sql = "INSERT INTO clientes (nome, cpf)
    VALUES (:nome, :cpf)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
     $stmt->bindParam(':cpf', $cpf);
      

     if($stmt->execute()){
        header("Location:clientes.php");
        exit;
     }else{
        echo "Deu Ruim!";
     }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #2e86de;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1b4f72;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome</label>
       <input type="text" name="nome" id="">

       <label for="cpf">CPF</label>
       <input type="text" name="cpf" id="">

       <button type="submit">Enviar</button>
    </form>
    
</body>
</html>