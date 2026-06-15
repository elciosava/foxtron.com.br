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

$sql_select  = "SELECT * FROM `alunos`";
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

<form action="gravar_aluno.php" method="post">
    <label for="nome_aluno">Nome</label>
    <input type="text" name="nome_aluno" id="">

    <label for="email_aluno">Email</label>
    <input type="text" name="email_aluno" id="">

    <label for="cpf">cpf</label>
    <input type="number" name="cpf" id="">

    <button type="submit">enviar</button>
</form>

<table>
    <thead>
        <tr>
            <th>Nome aluno</th>
            <th>Email</th>
            <th>CPF</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($aluno = $stmt_select->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $aluno['nome_aluno'] ?></td>
                <td><?= $aluno['email_aluno'] ?></td>
                <td><?= $aluno['cpf_aluno'] ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>