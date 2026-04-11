<?php

$local = 'localhost';//local onde esta o banco de dados
$banco = 'rodrigo'; // nome do banco de dados
$usuario = 'root'; //usuario do banco de dados
$senha = '' ;      //senha padrao do bnaco de dados

try{
    $conexao = new PDO ( "mysql:local=$local;dbname=$banco",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   
}catch (PDOException $e) {
    echo "Não conectou". $e->getMessage();
}

$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];

$sql = "INSERT INTO endereco (rua,numero,bairro) VALUES (:rua,:numero,:bairro)";

//prepara a inscrição sql
$stmt = $conexao->prepare($sql);

//carregar nossa variáveis
$stmt->bindParam(':rua',$rua);
$stmt->bindParam(':numero',$numero);
$stmt->bindParam(':bairro',$bairro);


//executa a instrução sql

$stmt->execute();


?>

<!DOCTYPE html>
<html lang="pt-en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
     <form action="" method="post">
        <label for="rua">Rua</label>
        <input type="text" name="rua" id="">

        <label for="numero">Numero</label>
        <input type="nunber" name="numero" id="">

        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="">




        <button type="submit">ENVIAR</button>
  
        </form>

    </div>
    
</body>
</html>