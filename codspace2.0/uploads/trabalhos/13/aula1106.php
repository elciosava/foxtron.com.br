<?php
$local = 'localhost';
$banco = 'breno';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "Num deo conequissao, beta." . $erro->getMessage();
}
//termino da parte de conexao com banco de dados

//inicio da parte do select da nossa tabela

$sql_select = "SELECT * FROM `alunos`";
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

    <form action="gravar_aluno.php" method="post">
        <label for="nome_aluno">Nome: </label>
        <input type="text" name="nome_aluno" id="">

        <label for="email_aluno">Email: </label>
        <input type="email" name="email_aluno" id="">

        <label for="cpf_aluno">CPF: </label>
        <input type="password" name="cpf_aluno" id="">

        <button type="submit">Cadastrar</button>
    </form>
    <table>
        <thead>
            <th>Nome Aluno</th>
            <th>Email</th>
            <th>CPF</th>
        </thead>
        <?php
        while ($alunos = $stmt_select->fetch(PDO::FETCH_ASSOC)) {
            echo "<tbody>";
            echo "<tr>";
            echo "<td>{$alunos['nome_aluno']}</td><td>{$alunos['email_aluno']}</td><td>{$alunos['cpf_aluno']}</td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
</body>

</html>