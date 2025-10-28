<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['professor'];

    $sql = "INSERT INTO professores (nome) 
            VALUES (:nome)";
    
    $stmt = $conexao->prepare($sql);  
    $stmt->bindParam(':nome', $nome); 
    
    if ($stmt->execute()){
        header("Location: cadastrar_professor.php");
        exit;
    } else {
        echo "Erro ao salvar: " . implode(", ", $stmt->errorInfo());
    }
    }

$sql_professores = "SELECT * FROM `professores`";
$stmt_professores = $conexao->prepare($sql_professores);
$stmt_professores->execute();
$professores = $stmt_professores->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <form action="" method="post">
            <label for="professor">Professor</label>
            <input type="text" name="professor" id="professor" required>
            <button type="submit" class="submit">Salvar</button>
        </form>
    </section>
    
</body>
</html>