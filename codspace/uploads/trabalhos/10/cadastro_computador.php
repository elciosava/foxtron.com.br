<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $computador = $_POST['computador'];  

    $sql_inserir_c = "INSERT INTO computadores (computador) 
                    VALUES (:computador)";
    
    $stmt_inserir_c = $conexao->prepare($sql_inserir_c);
    $stmt_inserir_c->bindParam(':computador', $computador);
    $stmt_inserir_c->execute();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Computador</title>
</head>

<body>
    <style>
        body {
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right,#e4e7ec,#61377a,#594192) ;
        }
        button {
            height: 30px;
            width: 80px;
            margin-top: 5px;
        }
        form {
            width: 400px;
            border: solid 1px black;
            padding: 20px;
            margin: 10px;
        }
        input,select {
            width: 100%;
            padding: 2px;
        }

    </style>
    <div class="container">
        <form action="" method="post">
            <label for="computador">Nome do Computador: </label>
            <input type="text" name="computador">

            <button class="submit">Salvar</button>
        </form>
    </div>
</body>
</html>


