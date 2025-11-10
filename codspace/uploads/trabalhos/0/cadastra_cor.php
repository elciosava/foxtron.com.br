<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cod_cor = trim($_POST['cod_cor']);
    $nome = trim($_POST['nome']);

    if (!empty($cod_cor) && !empty($nome)) {
        $sql = "INSERT INTO `cores` (cod_cor, nome) VALUES (:cod_cor, :nome)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':cod_cor', $cod_cor);
        $stmt->bindParam(':nome', $nome);

        if ($stmt->execute()) {
            echo "Sucesso ao cadastrar!";
        } else {
            echo "Erro ao cadastrar a cor.";
        }
    } else {
        echo "Preencha todos os campos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
         <form action="" method="post">
    <label for="nome">Escreva a cor</label>
    <input type="text" name="nome" id="">
    <label for="cod_cor">Escolha a cor</label>
    <input type="color" name="cod_cor" id="">    
     <button type="submit">salvar</button>
     
</form>
   </div>  
</body>

</html>