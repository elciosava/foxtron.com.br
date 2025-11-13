<?php
 include 'conexao.php';


 if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $serie = $_POST['serie'];


    $sql = "INSERT INTO alunos (nome, serie)
    VALUES (:nome, :serie)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':serie', $serie);
    $stmt->execute();
 }
   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">

        <label for="nome">Nome do aluno</label>
        <input type="text" name="nome" id="">

         <label for="serie">Série do aluno</label>
        <input type="text" name="serie" id="">

        <button class="submit">Salvar</button>

        </form>
    </div>
</body>
</html>