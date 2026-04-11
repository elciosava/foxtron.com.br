<?php 
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];
    $cor = $_POST['cor'];

    $sql = "INSERT INTO carros (modelo, placa, cor)
            VALUES (:modelo, :placa, :cor)";
          
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam('modelo',$modelo);
    $stmt->bindParam('placa',$placa);
    $stmt->bindParam('cor',$cor);

    if ($stmt->execute()){
        header("Location:carros.php");
        exit;
    }else {
        echo "<p>nao deu certo :C</p>";
    }
        }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <div class="container">
        <form action="" method="post">
            <label for="modelo">Modelo</label>
              <input type="text" name="modelo" id="">

            <label for="placa">Placa</label>
              <input type="text" name="placa" alt="">

            <label for="cor">Cor</label>
              <input type="color" name="cor" id="">

            <button type="submit">Salva</button>
        </div>
        </form>
    </section>
</body>
</html>