<?php
    ini_set("display_errors",0);

    //conexao com banco de dados
    //declarar 4 variaveis
    $local = 'localhost';
    $banco = 'joao';
    $usuario = 'root';
    $senha = '';

    try{
        $conexao = new PDO ("mysql:local=$local;dbname=$banco",$usuario, $semha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        echo "Tem parada errada aí !!!" . $e->getMessage();
    }

    //carregar campos para variaveis

    $nome  = $_POST['nome'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuario (nome, senha) VALUES (:nome, :senha)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bênio</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container{
            width: 300px;
            background: rgba(15, 184, 85, 1);
            padding: 10px;
        }

        input{
            width: 250px;
            box-sizing: border-box;
        }

    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="">

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="">

            <button type="submit">Enviar</button>

        </form>
    </div>
</body>
</html>