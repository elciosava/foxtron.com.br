<?php
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){   
        $nome = $_POST['nome'];

           $sql = "INSERT INTO professores (nome) VALUES(:nome)";
           $stmt = $conexao->prepare($sql);
           $stmt->bindParam(':nome', $nome);
           
           if ($stmt->execute()){
            header("Location: cadastrarprofessor.php")
            exit;
           }else{ 
            echo "Erro ao salvar o professor!";
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
</body>
<section>
    <div class="container">
        <form action="" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">
            <button class="submit">Salvar</button>
        </form>
    </div>
</section>
</html>
