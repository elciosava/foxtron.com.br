<?php

//4 variaveis que sao padrao
$local = 'localhost';
$banco = 'murilo';
$usuario = 'root';
$senha = '';


//tentar uma conexao com banco
try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $erro){
    echo "Num deu conexão, meu truta." . $erro->getMessage();
}

//termino da parte de conexao com banco de dados 

//inicio da parte do select da nossa tabela 

$sql_select = "SELECT * FROM alunos";
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
    <header><h2>Cadastro De Formulário</h2>
</header>

<style>
    *{
        margin: 0;
        padding: 0;
    }

    header {
        height: 100px;
        justify-content: center;
        align-items: center;
        display: flex;
        background-color: burlywood;

    }

    .formulario {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    input {
        width: 100%;
    }

    body {
        background-color: beige;
    }
    

    form {
        margin: 300px;
        padding: 15px;
    }
</style>
    
</body>

    <form action="gravar_aluno.php" method="post">
        <label for="nome_aluno">Nome</label>
        <input type="text" name="nome_aluno" id="">

        <label for="email_aluno">Email</label>
        <input type="text" name="email_aluno" id="">

        <label for="cpf_aluno">CPF</label>
        <input type="text" name="cpf_aluno" id="">

        <button type="submit">Enviar</button>
    </form>
    <table>
        <thead>
            <th>Nome cliente</th>
            <th>Email</th>
            <th>Senha</th>
        </thead>
        <?php
        
while ($alunos = $stmt_select->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>";
    echo "</tr>{$alunos['nome_aluno']}</td><td>{$alunos['email_aluno']}</td><td>{$alunos['cpf_aluno']}</td>";
    echo "</tr>";
    echo "</tbody>";
}

        ?>
    </table>
</html>