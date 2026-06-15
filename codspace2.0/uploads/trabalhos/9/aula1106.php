<?php

//4 variaveis que sao padrao
$local = 'localhost';
$banco = 'ruanf';
$usuario = 'root';
$cpf = '';

//tentar uma conexaom com banco
try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "num deu conexeao, meu truta." . $erro->getMessage();
}
//termino da parte de conexeo com banco de dados

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
        <label for="nome_aluno">aluno</label>
        <input type="text" name="nome_aluno" id="">

        <label for="nome_aluno">email</label>
        <input type="email" name="email_aluno" id="">

        <label for="nome_cpf">cpf</label>
        <input type="password" na0me="cpf_aluno" id="">

        <button type="submit">cadastrar</button>
    </form>

    </form>
    <table>
        <thead>
            <th>nome aluno</th>
            <th>email</th>
            <th>cpf</th>
        </thead>
        <?php
        while ($aluno = $stmt_select->fetch(PDO::FETCH_ASSOC)) {
            echo "<tbody";
            echo "<tr>";
            echo "<td>{$aluno['nome_aluno']}</td><td>{$aluno['email_aluno']}</td><td>{$aluno['cpf_aluno']}</td>";
            echo "</tr>";
            echo "</tbody";
        }
        ?>
    </table>
</body>

</html>