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

$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];

// carregar a instrução sql
$sql = "INSERT INTO endereco (rua, numero, bairro) VALUES (:rua,:numero,:bairro)";

// preparar a instrução sql
$stmt = $conexao->prepare($sql);

// carregar nossas variaveis
$stmt->bindParam(':rua', $rua);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':bairro', $bairro);

// executar a instrução sql
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 03/03 Exercicio</title>
</head>
<body>
    <div class="conteiner">
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