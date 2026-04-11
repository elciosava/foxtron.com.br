<?php
    //conexao com banco e dados
    //declarar 4 variaveis
    $local= 'localhost'; //local onde esta seu banco
    $banco = 'laura'; // nome do eu banco de dados
    $usuario = 'root'; //usuario padrão do meu banco de dados
    $senha = ''; //senha padrão do banco de dados

    try{
        $conexao = new PDO ("mysql:local=$local;dbname=$banco",$usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        echo "Não conectou!" . $e->getMessage();
    }

    //carregar campos para variaveis
     $rua = $_POST['rua'];
     $numero = $_POST['numero'];
     $bairro = $_POST['bairro'];

    //carreagr instrução sql
    $sql = "INSERT INTO endereco (rua, numero, bairro) VALUES (:rua, :numero, :bairro)";

    //prepara a instrução sql
    $stmt = $conexao->prepare($sql);
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
            <input type="number" name="numero" id="">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="">
            

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>