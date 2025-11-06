<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

    $sql_inserir = "INSERT INTO clientes (nome, cpf) 
                    VALUES (:nome, :cpf)";
    
    $stmt_inserir = $conexao->prepare($sql_inserir);
    $stmt_inserir->bindParam(':nome', $nome);
    $stmt_inserir->bindParam(':cpf', $cpf);
    $stmt_inserir->execute();
    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clientes</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required>

            <label for="cpf">Cpf</label>
            <input type="number" name="cpf" id="cpf" required>

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>