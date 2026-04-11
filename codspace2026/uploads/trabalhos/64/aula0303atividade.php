<?php
    //conexao com banco de dados
    //declarar 4 variaveis
    $local = 'localhost';//local onde esta meu banco
    $banco = 'elias';//nome do meu banco de dados 
    $usuario = 'root';//usuario padrão do banco de dados
    $senha = '';//senha padrao do banco de dados


    try{
        $conexao = new PDO ("mysql:local=$;dbname=$banco",$usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        echo "Não conectou!" . $e->getMessage();
    }

        //carregar campos para variaveis
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    //carrega a instrução sql
    $sql = "INSERT INTO usuario (nome, senha) VALUES (:nome, :senha)";

    //prepara a institrução sql
    $stmt = $conexao->prepare($sql);
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