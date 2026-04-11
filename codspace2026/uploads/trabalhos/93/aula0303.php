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

$nome = $_POST['nome'];
$senha = $_POST[ 'senha'];

$sql = "INSERT INTO usuario (nome,senha) VALUES (:nome, :senha)";

//prepara a inscrição sql
$stmt = $conexao->prepare($sql);
//carregar nossa variáveis
$stmt->bindParam(':nome',$nome);
$stmt->bindParam(':senha',$senha);

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
        <label for="nome">NOME</label>
        <input type="text" name="nome" id="">

        <label for="senha">SENHA</label>
        <input type="password" name="senha" id="">

        <button type="submit">SALVAR</button>
  
        </form>

    </div>
    
</body>
</html>