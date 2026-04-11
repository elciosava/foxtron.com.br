<?php
// conexao com banco de dados
// declarar 4 variaveis
$local = 'localhost'; // local onde esta meu banco
$banco = 'natan'; // nome do meu banco de dados
$usuario = 'root'; // usuario padrao do banco de dados
$senha = ''; // senha padrao do banco de dados

try {
    $conexao = new PDO ("mysql:local=$local;dbname=$banco",$usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo "Não Conectou!" . $e->getMessage();
}

$nome = $_POST['nome'];
$senha = $_POST['senha'];

// carregar a instrução sql
$sql = "INSERT INTO usuario (nome, senha) VALUES (:nome,:senha)";

// preparar a instrução sql
$stmt = $conexao->prepare($sql);

// carregar nossas variaveis
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':senha', $senha);

// executar a instrução sql
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 03/03</title>
</head>
<body>
    <div class="conteiner">
        <form action="" method="post">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="">

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>