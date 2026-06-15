<?php
//4 variaveis que sao padrao
$local = 'localhost';
$banco = 'thomaz';
$usuario = 'root';
$senha = '';

//tentar uam conexao com banco 
try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "num deu conexao, meu truta." . $erro->getMessage();
}
//termino do parte de conexao com banco de dados

//inicio da parte do select da nossa tabela

$sql_select = "SELECT * FROM alunos";
$stmt_select =$conexao ->prepare($sql_select);
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
    <form action="gravar_alunos.php" method="post">
        <label for="nome">aluno</label>
        <input type="text" name="aluno" id="">

        <label for="email_aluno">email</label>
        <input type="text" name="email_aluno" id="">

        <label for="cpf_aluno">cpf</label>
        <input type="text" name="cpf" id="">

        <button type="submit">cadastro</button>
    </form>
    <table>
        <thead>
            <th>Nome alunos</th>
            <th>Email</th>
            <th>Senha</th>
        </thead>
        <?php
        while ($aluno = $stmt_select->fetch(PDO::FETCH_ASSOC)) {
            echo "<tbody>";
            echo "<tr>";
            echo "<td>{$aluno['nome_aluno']} </td><td>{$aluno['email_aluno']}</td><td>{$aluno['cpf_aluno']}</td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
</body>

</html>