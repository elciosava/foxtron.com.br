<?php
 include 'conexao.php';

    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    
    

$sql = "INSERT INTO endereco (rua,numero,bairro,cidade)
       VALUES (:rua, :numero, :bairro, :cidade)";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':rua', $rua);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':bairro', $bairro);
$stmt->bindParam(':cidade', $cidde);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar endereco</title>
</head>
<body>
    <section id="formulario">
        <form action="" method="post">
           <label for="rua">rua</label>
           <input type="text" name="rua" id="">

            <label for="numero">numero</label>
           <input type="number" name="number" id="">

           <label for="bairro">bairro</label>
           <input type="text" name="bairro" id="">

           <label for="cidade">cidade</label>
           <input type="text" name="cidade" id="">

           <button type="submit">enviar</button>
        </form>
</body>
</html>
