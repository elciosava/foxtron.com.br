<?php
    //4 variaveos que sao padrao
    $local = 'localhost';
    $banco ='joao';
    $usuario = 'root';
    $cpf = '';

    //tentar uma conexao com banco
    try {
        $conexao = new PDO ("mysql:host=$local;dbname=$banco;",$usuario,$cpf);
        $conexao-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $erro) {
        echo "Num deu conexão, meu truta.". $erro->getMessage();
    }
    //termino da parte de conexao com banco de dados

    //inicio da parte do select da nossa tabela

    $sql_select = "SELECT * FROM `aluno`";
    $stmt_select = $conexao->prepare($sql_select);
    $stmt_select-> execute();
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
            <label for="nome_aluno">Nome-Aluno</label>
            <input type="text" name="nome_aluno" id="">

            <label for="email_aluno">Email-Aluno</label>
            <input type="text" name="email_aluno" id="">

            <label for="cpf_aluno">cpf-Aluno</label>
            <input type="password" name="cpf_aluno" id="">

            <button type="submit">Cadastrar</button>
        </form>
        <table>
            <thead>
                    <th>Nome </th>
                    <th>Email</th>
                    <th>cpf</th>
            </thead>
            <?php
            
            while ($aluno = $stmt_select->fetch(PDO::FETCH_ASSOC)){
        
        echo "<tbody";
        echo "<tr>";
            echo "<td>{$aluno['nome_aluno']}</td><td>{$aluno['email_aluno']}</td><td>{$aluno['cpf_aluno']}</td>";
        echo "</tr>";
        echo "</tbody>";
    }
    ?>
        </table>
    </body>
    </html>

    
