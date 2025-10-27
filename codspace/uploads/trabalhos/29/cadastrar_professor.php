<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];

    $sql = "INSERT INTO professores (nome) VALUES (:nome)";

             $stmt = $conexao->prepare($sql);
             $stmt->bindParam(':nome', $nome);

             if ($stmt->execute()){

                header("location:cadastrar_professor.php");
                exit;
             }else{
                echo "nao deu truta";
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
            <form action="" method="post">
                <label for="nome">nome</label>
                <input type="text" name="nome" id="">
                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
</body>
</html>


