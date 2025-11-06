<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nasce = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO cadastro (nome, sobrenome,nascimento, email, telefone)
            VALUES (:nome, :sobrenome, :nascimento, :email, :telefone)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sobrenome', $sobrenome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':nascimento', $data_nasce);
    $stmt->bindParam(':telefone', $telefone);

    if ($stmt->execute()){
        header("Location:cadastro.php");
        exit;
    }else{
        echo "não deu boa!";
    }
}

 $sql = "SELECT * FROM cadastro";
 $stmt = $conexao->prepare($sql);
 $stmt->execute();



?>
<!DOCTYPE html>
<html lang="pt.br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body  {
            display: flex;
            justify-content: center;

        }
        form {
            width: 450px;

        }
        input, select{
            box-sizing: border-box;
            width: 100%;
            margin=botton: 20px;
            padding: 5px;

        }
        button {
            background: #0044ff;
            width: 100%;
            height: 40px;
            border: 0;
            color: #fff;
            border-radius: 10px;
        }
        </style>

</head>
<body>
   <form action="" method="post">
    <div class="container">
            <form action="" method="post">

                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="">

                <label for="data_nascimento">Data de Nascimento</label>
                <input type="number" name="data_nascimento" id="">

                <label for="email">Email</label>
                <input type="email" name="email" id="">

                <label for="telefone">Telefone</label>
                <input type="number" name="telefone" id="">

            <button type="submit">Salvar</button>
        </form>
        </div>
               
</body>
</html>