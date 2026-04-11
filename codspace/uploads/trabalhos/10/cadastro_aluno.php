<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];   

    $sql_inserir_a = "INSERT INTO alunos (nome) 
                    VALUES (:nome)";
    
    $stmt_inserir_a = $conexao->prepare($sql_inserir_a);
    $stmt_inserir_a->bindParam(':nome', $nome);
    $stmt_inserir_a->execute();

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Aluno</title>
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
            <label for="nome">Nome do Aluno: </label>
            <input type="text" name="nome">

            <button class="submit">Salvar</button>
        </form>
    </div>
</body>
</html>
