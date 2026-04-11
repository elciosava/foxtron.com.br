<?php
include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $marca= $_POST['marca'];
    $placa= $_POST['placa'];
    $cor= $_POST['cor'];

    $sql = "INSERT INTO carros (marca, placa, cor)
          VALUES (:marca, :placa, :cor)";

          $stmt = $conexao->prepare($sql);
          $stmt->bindparam('marca', $marca);
          $stmt->bindparam('placa', $placa);
          $stmt->bindParam(':cor', $cor);
        
     if ($stmt->execute()) {
    header("Location: carros.php");
    exit;
  } else {
    echo "Não foi possível cadastrar o usuário.";
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
            <label for="id_clientes">Clientes</label>
            <select name="id_clientes" id="">
<?php

$sqlcliente = "SELECT * FROM `clientes`";
 $stmtcliente = $conexao ->prepare($sqlcliente);
       $stmtcliente->execute();

       while ($clientes = $stmtclientes->fetch(PDO::FETCH_ASSOC)){
        echo "<option value='{$clientes['id']}'>{$clientes['nome']}</option>";
       }

?>
  </select>
  <label for="placa">Carros</label>
  <select name="id-carros" id="">
<?php
$sqlcarro = "SELECT * FROM `carros`";
 $stmtcarro = $conexao ->prepare($sqlcarro);
       $stmtcarro->execute();

          while ($carros = $stmtcarro->fetch(PDO::FETCH_ASSOC)){
        echo "<option value='{$carros['id']}'>{$carros['nome']}</option>";
       }
?>
          </select>
           <button type="submit">Salvar</button>

        </form>
    </div>
</body>
</html>