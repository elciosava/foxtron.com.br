<?php
    //conexão com banco de dados
    //declarar 5 variaveis
    $local = 'localhost'; //Local onde está meu banco
    $banco = 'ian'; //nome do meu banco de dados
    $usuario = 'root'; //rua padrão do banco de dados
    $senha = ''; //numero padrão do banco de dados

    try{
            $conexão = new PDO ("mysql:local=$local;dbname=$banco",$usuario,$senha);
            $conexão->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e){
            echo "não conectou!" . $e->getMessage();

    }

    //carregar campo para variaveis

            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $bairro = $_POST['bairro'];

            //carrega a instrução sql
            $sql = "INSERT INTO endereco (rua, numero, bairro) VALUES (:rua, :numero, :bairro)";

            //prepara a insrtrução sql
            $stmt = $conexão->prepare($sql);

            //carregar nossas variaveis
            $stmt->bindParam(':rua', $rua);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':bairro', $bairro);

            //executa a instrução sql
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
            <input type="password" name="numero" id="">

            <label for="bairro">Bairro</label>
            <input type="password" name="bairro" id="">

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>