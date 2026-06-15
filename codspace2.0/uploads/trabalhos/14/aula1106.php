<?php

//4 variaaveis que sao padrao
$local = 'localhost';
$banco = 'niko';
$usuario = 'root';
$cpf = '';

//tentar uma conexao com banco 
try{
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$cpf);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $erro){
    echo "num deu conexão, meu truta." .$erro->getMessage();
}
//terminio da parte de conexao com banco de dados 

//inicio da parte de select da nossa tabela 

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
    <table>
        <head>
            <body>
                <form action="gravaraluno.php"method="post">
                    <label for="nome_aluno" >Nome</label>
                    <input type="text" name="nome_aluno" id="">

                     <label for="email_cliente" >Email</label>
                    <input type="email" name="email_aluno" id="">

                     <label for="senha_cliente" >Senha</label>
                     <input type="senha" name="cpf_aluno" id="">

                     <button type="submit">Cadastrar</button>
                </form>
<table>
                <thead>
                    <the>Nome</the>
                    <the>Email</the>
                    <the>cpf</the>
                </thead>

                <?php
                    while ($aluno=$stmt_select->fetch(PDO::FETCH_ASSOC)){
    echo "<tbody>";
    echo "<tr>";
       echo "<td>{$aluno['nome_aluno']}</td><td>{$aluno['email_aluno']}</td><td>{$aluno['cpf_aluno']}</td>";
    echo "</tr>";
    echo"</tbody>";

}
                ?>

            </body>
        </head>
    </table>
</body>
</html>