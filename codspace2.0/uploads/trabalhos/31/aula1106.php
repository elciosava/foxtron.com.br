<?php

    $local = 'localhost';
    $banco = 'ariel';
    $usuario = 'root';
    $senha = '';

    try{
        $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $erro){
        echo "Num deu conexão,meu truta." . $erro->getMessage();
    }

    $sql_select = "SELECT * FROM `aluno`";
    $stmt_select =$conexao->prepare($sql_select);
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
        <label for="nome_aluno">Nome:</label>
        <input type="text" name="nome_aluno" id="">

        <label for="email_aluno">Email:</label>
        <input type="email" name="email_aluno" id="">

        <label for="cpf_aluno">CPF:</label>
        <input type="number" name="cpf_aluno" id="">

        <button type="submit">Cadastrar</button>
    </form>
    <table>
        <thead>
            <th>Nome aluno</th>
            <th>Email aluno</th>
            <th>cpf aluno</th>
        </thead>
        <?php
             while ($aluno = $stmt_select->fetch(PDO::FETCH_ASSOC)){
        echo "<tbody>";
        echo "<tr>";
            echo "<td>{$aluno['nome_aluno']}</td><td>{$aluno['email_aluno']}</td><td>{$aluno['cpf_aluno']}</td> ";
        echo "</tr>";
        echo "</tbody>";
    }
        ?>
    </table>
</body>
</html>

   