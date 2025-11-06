<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $CPF = $_POST['cpf'];
    

    $sql = "INSERT INTO clientes (nome, cpf)
            VALUES (:nome, :cpf)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $CPF);

    if ($stmt->execute()){
        header("Location:clientes.php");
        exit;
    }else{
        echo "não deu boa!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="cpf">CPF</label>
            <input type="number" name="cpf" id="">
            <button type="submit">Salvar</button>
        </div>
    </form>
</body>
</html>