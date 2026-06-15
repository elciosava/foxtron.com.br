<?php

//4 variaveis que sao padrao
$local = 'localhost';
$banco = 'erick';
$usuario = 'root';
$senha = '';

//tentar uma conexao com banco
try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $erro){
    echo "num deu conexão, meu truta." . $erro->getMessage();
}
//termino da parte de conexão com banco de dados

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
        <label for="nome_aluno">nome:</label>
        <input type="text" name="nome_aluno" id="">

        <label for="email_aluno">email:</label>
        <input type="email" name="email_aluno" id="">

        <label for="cpf_aluno">CPF:</label>
        <input type="number" name="cpf_aluno" id="">

        <button type="submit">enviar</button>
    </form>
     <table>
        <thead>
            <th>nome aluno</th>
            <th>email aluno</th>
            <th>cpf aluno</th>
        </thead>
        <?php
            while ($alunos=$stmt_select->fetch(PDO::FETCH_ASSOC)){
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