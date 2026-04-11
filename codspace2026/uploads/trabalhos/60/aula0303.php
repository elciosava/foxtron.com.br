<?php
    //conexão com banco de dados
    //declarar 4 variaveis
    $local = 'localhost'; //Local onde está meu banco
    $banco = 'ian'; //nome do meu banco de dados
    $usuario = 'root'; //usuario padrão do banco de dados
    $senha = ''; //senha padrão do banco de dados

    try{
            $conexão = new PDO ("mysql:local=$local;dbname=$banco",$usuario,$senha);
            $conexão->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e){
            echo "não conectou!" . $e->getMessage();

         

    }

    //carregar campo para variaveis

            $nome = $_POST['nome'];
            $senha = $_POST['senha'];

            //carrega a instrução sql
            $sql = "INSERT INTO usuario (nome, senha) VALUES (:nome, :senha)";

            //prepara a insrtrução sql
            $stmt = $conexão->prepare($sql);

            //carregar nossas variaveis
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':senha', $senha);

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
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="">

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>