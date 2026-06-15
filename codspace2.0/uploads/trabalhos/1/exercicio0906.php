<?php
//4 variaveis que sao padrao
$local = 'localhost';
$banco = 'elcio';
$usuario = 'root';
$senha = '';

//tentar uma conexao com banco
try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "Num deu conexão, meu truta." . $erro->getMessage();
}
//termino da parte de conexao com banco de dados

//inicio da parte do select da nossa tabela

$sql_select = "SELECT * FROM `clientes`";
$stmt_select = $conexao->prepare($sql_select);
$stmt_select->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="gravar_cliente.php" method="post">
        <label for="nome_cliente">Nome</label>
        <input type="text" name="nome_cliente" id="">

        <label for="email_cliente">Email</label>
        <input type="email" name="email_cliente" id="">

        <label for="senha_cliente">Senha</label>
        <input type="password" name="senha_cliente" id="">

        <button type="submit">Cadastrar</button>
    </form>

    <table>
        <thead>
            <th>Nome cliente</th>
            <th>Email</th>
            <th>Senha</th>
        </thead>
        <?php
        while ($clientes = $stmt_select->fetch(PDO::FETCH_ASSOC)) {
            echo "<tbody>";
            echo "<tr>";
            echo "<td>{$clientes['nome_cliente']}</td><td>{$clientes['email_cliente']}</td><td>{$clientes['senha_cliente']}</td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
</body>

</html>