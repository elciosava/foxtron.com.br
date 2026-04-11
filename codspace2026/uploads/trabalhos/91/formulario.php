<?php
ini_set("display_errors",0);
include 'conexao.php';

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $serie = $_POST['serie'];
    
    

$sql = "INSERT INTO cadastrar (nome,idade,serie)
       VALUES (:nome, :idade, :serie)";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':idade', $idade);
$stmt->bindParam(':serie', $serie);
$stmt->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
        
        * { 
        padding: 0;
        margin:0;
        box-sizing: border-box;
     }

        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items:center;
        }
    
        form {
            width: 300px;
            background: rgb(186, 121, 230);
            padding: 20px;
        }

        input {
            width: 100%;
            box-sizing: border-box;
        }  

         header {
        height: 60px;
        padding: 10px;
        display:flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0px 1px 20px #c743e4;
        }

        header img {
            width: 50px
        }

        ul {
            display: flex;
            justify-content: space-around;
        }

        li {
            list-style: none;
            margin-left: 10px;
        }

    </style>
</header>
<body>
    <form action="" method="post">
        <label for="nome">nome</label>
        <input type="text" name="nome" id="">

        <label for="idade">idade</label>
        <input type="number" name="idade" id="">

        <label for="serie">serie</label>
        <input type="text" name="serie" id="">

        <button type="submit">enviar</button>
    </form>

</body>
</html>