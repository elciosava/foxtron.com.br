<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $marca= $_POST['marca'];
    $placa = $_POST['placa'];
    $cor = $_POST['cor'];
   
           $sql = "INSERT INTO carros (nome, marca, placa, cor)
        VALUES (:nome, :marca, :placa, :cor)";

        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':placa', $placa);
        $stmt->bindParam(':cor', $cor);
        
        if($stmt->execute()){
            header("Location:carros.php");
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
        <label for="marca">Marca</label>
     <input type="text" name="marca" id="">
     <label for="placa">Placa</label>
     <input type="text" name="placa" id="">
      <label for="cor">Cor</label>
     <input type="color" name="cor" id="">

     <button class="submit">Salvar</button>
    </form>
    </div>
</body>
</html>