<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];

    $sql = "INSERT INTO professores (nome)
             VALUES (:nome)";

    $stmt = $conexao->prepare($sql);   
    $stmt->bindParam('nome', $nome);

    if ($stmt->execute()){
        header("Location:cadastrar_professor.php");
        exit;
    }else{
        echo "não deu boa!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <div class="container">
            <label for="nome">Professor</label>
                <input type="text" name="nome" id="nome" required>
                <button class="submit">Salvar</button>
            </form>
        </div>
    </section>
    
</body>
</html>