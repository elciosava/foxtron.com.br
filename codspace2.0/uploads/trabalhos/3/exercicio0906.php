<?php
$local   = 'localhost';
$banco   = 'leonardo';
$usuario = 'leonardo';
$senha   = 'suasenha';

try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida!";
} catch (PDOException $erro) {
    echo "Num deu conexão, meu truta: " . $erro->getMessage();
}

$sql_select  = "SELECT * FROM `clientes`";
$stmt_select = $conexao->prepare($sql_select);
$stmt_select->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>

<form action="gravar_cliente.php" method="post">
    <label for="nome_cliente">Nome</label>
    <input type="text" name="nome_cliente" id="nome_cliente">

    <label for="email_cliente">Email</label>
    <input type="text" name="email_cliente" id="email_cliente">

    <label for="senha_cliente">Senha</label>
    <input type="password" name="senha_cliente" id="senha_cliente">

    <button type="submit">Cadastrar</button>
</form>

<table>
    <thead>
        <tr>
            <th>Nome cliente</th>
            <th>Email</th>
            <th>Senha</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($clientes = $stmt_select->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $clientes['nome_cliente'] ?></td>
                <td><?= $clientes['email_cliente'] ?></td>
                <td><?= $clientes['senha_cliente'] ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>