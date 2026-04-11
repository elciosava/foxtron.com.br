<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $data_nasc = $_POST['data_nasc'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $sql_inserir = "INSERT INTO cadastro (nome, data_nasc, telefone, email) 
                    VALUES (:nome, :data_nasc, :telefone, :email)";
    
    $stmt_inserir = $conexao->prepare($sql_inserir);
    $stmt_inserir->bindParam(':nome', $nome);
    $stmt_inserir->bindParam(':data_nasc', $data_nasc);
    $stmt_inserir->bindParam(':telefone', $telefone);
    $stmt_inserir->bindParam(':email', $email);
    
}

$sql_cadastro = "SELECT * FROM `cadastro`";
$stmt_cadastro = $conexao->prepare($sql_cadastro);
$stmt_cadastro->execute();
$cadastros = $stmt_cadastro->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required>

            <label for="data_nasc">Data de Nascimento</label>
            <input type="date" name="data_nasc" id="data_nasc" required> <!-- Corrigido -->

            <label for="telefone">Telefone</label>
            <input type="tel" name="telefone" id="telefone" required> <!-- Melhor usar tel -->

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>