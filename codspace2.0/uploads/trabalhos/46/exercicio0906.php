<?php
// 4 variaveis que sao padrao
$local = 'localhost';
$banco = 'vitoria';
$usuario = 'root';
$senha = '';

// tentar uma conexao com banco
try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $erro){
    echo "Num deu conexão, meu truta." . $erro->getMessage();
}
// termino da parte de conexao com banco de dados

//inicio da aprte do select da nossa tabela

$sql_select = "SELECT * FROM clientes";
$stmt_select = $conexao->prepare($sql_select);
$stmt_select->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>nome_cliente</th>
            <th>email_cliente</th>
            <th>senha</th>

            </th>
        </thead>
        <?php
        while ($clientes = $stmt_select->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>";
        echo "<td>{$clientes['nome_cliente']}</td><td>{$clientes['email_cliente']}</td><td>{$clientes['senha_cliente']}</td>";
    echo "</tr>";
        }
        ?>
        
    </table>
    
</body>
</html>

