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

    $rua  = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];

    $sql = "INSERT INTO endereco (rua, numero, bairro) VALUES (:rua, :numero, :bairro)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':rua', $rua);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':bairro', $bairro);
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
            width: 200px;
            background: rgba(15, 184, 85, 1);
            padding: 10px;
        }

        input{
            width: 200px;
            box-sizing: border-box;
        }

    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="rua">Rua:</label>
            <input type="text" name="rua" id="">

            <label for="senha">Número:</label>
            <input type="number" name="numero" id="">

            <label for="bairro">Bairro:</label>
            <input type="text" name="bairro" id="">

            <button type="submit">Enviar</button>

        </form>
    </div>
</body>
</html>