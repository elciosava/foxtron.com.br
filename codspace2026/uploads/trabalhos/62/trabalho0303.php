<?php
  //declarar 4 variaveis
  $local = 'localhost'; 
  $banco = 'gabriel'; 
  $usuario = 'root'; 
  $senha = ''; 

try{
    $conexao = new PDO ("mysql:local=$local;dbname=$banco",$usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
}catch (PDOEeception $e){
    echo "Não conectou!" . $e->getMessage();
}
//carregar campos para variaveis

$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];

$sql = "INSERT INTO endereco (rua, numero, bairro) VALUES (:rua, :numero, :bairro)";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':rua', $rua);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':bairro',$bairro);
$stmt->execute();
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
            <label for="rua">Rua</label>
            <input type="text" name="rua" id="">

            <label for="numero">Numero</label>
            <input type="number" name="numero" id="">

            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="">

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>



  