<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $sobrenome= $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
   
           $sql = "INSERT INTO clientes (nome, sobrenome, cpf)
        VALUES (:nome, :sobrenome, :cpf)";

        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':cpf', $cpf);
        
        if($stmt->execute()){
            header("Location:clientes.php");
        }else{ 
              echo "<p style= 'color:red;'>Deu ruim!!</p>";
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
    <div class="container">
     <form action="" method="post">
     <label for="nome">Nome</label>
     <input type="text" name="nome" id="">
        <label for="sobrenome">Sobrenome</label>
     <input type="text" name="sobrenome" id="">
     <label for="cpf">Cpf</label>
     <input type="text" name="cpf" id="">

     <button class="submit">Salvar</button>
    </form>
    </div>
</body>
</html>