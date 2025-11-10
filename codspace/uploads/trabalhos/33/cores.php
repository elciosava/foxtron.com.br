<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code_cor = $_POST['code_cor'];
    $nome_da_cor = $_POST['nome_da_cor'];

    $sql_inserir = "INSERT INTO cores (code_cor, nome_da_cor) 
                    VALUES (:code_cor, :nome_da_cor)";
    
    $stmt_inserir = $conexao->prepare($sql_inserir);
    $stmt_inserir->bindParam(':code_cor', $code_cor);
    $stmt_inserir->bindParam(':nome_da_cor', $nome_da_cor);
    $stmt_inserir->execute();
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cores</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="code_cor">Cor</label>
            <input type="color" name="code_cor" id="" >

            <label for="nome_da_cor"></label>
            <input type="text" name="nome_da_cor" id="" >

            <button type="submit">Salvar</button>
        </form>
    </div>
    
</body>
</html>