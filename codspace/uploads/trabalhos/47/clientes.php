<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];

            $sql = "INSERT INTO clientes (nome, cpf) VALUES (:nome, cpf:)";
                 VALUES (id_cliente);
                 
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);

            if ($stmt->execute()) {
                header("Location:clientes.php");
                exit;
            } else {
                echo "deu eerado";
            }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo2.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="" required>  
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="" required>

        <button type="submit">Adicionar cliente</button>
    </form>
</body>
</html>