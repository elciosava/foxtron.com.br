<?php
//ini_set("display_errors",0);
include 'conexao.php';

$nome = $_POST['nome'];
$senha = $_POST['senha'];

$sql = "INSERT INTO cadastro (nome, senha)
VALUES (:nome, :senha)";

$stmt = $conexao->prepare($sql);

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':senha', $senha);

$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
   
body {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;

}
    form {
        width: 300px;
        background: #e760d3
        padding: 20px;
    }

    input {
        width: 100%;
        box-sizing: border-box;
    }
     header {
             background: rgb(181, 148, 168);
            height: 60px;
            padding: 10px;
            box-shadow: 0 1px 20px gray;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }
         header img {
            width:50px;
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
<body>

     
    <section id="formulario">
    <form action="" method="post">
       <label for="nome">Nome</label>
       <input type="text" name="nome" id="">

       <label for="senha">Senha</label>
       <input type="text" name="senha" id="">

       <button type="submit">Enviar</button>

    </form>
    </section>
</body>
</html>