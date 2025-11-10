<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code_cor = $_POST['code_cor'];   
    $nome_cor = $_POST['nome_cor'];

    $sql_inserir = "INSERT INTO cores (code_cor, nome_cor) 
                    VALUES (:code_cor, :nome_cor)";
    
    $stmt_inserir = $conexao->prepare($sql_inserir);
    $stmt_inserir->bindParam(':code_cor', $code_cor);
    $stmt_inserir->bindParam(':nome_cor', $nome_cor);
    $stmt_inserir->execute();
    
    $sql = "SELECT * FROM cores ";
    $stmt = $conexao->prepare
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de cores</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">

            <label for="code_cor">Cor</label>
            <input type="color" name="code_cor" id="code_cor" required>

            <label for="nome_cor"></label>
            <input type="text" name="nome_cor" id="nome_cor" required>
            <button type="submit">Salvar</button>
        </form>
    </div>
    
</body>
</html>