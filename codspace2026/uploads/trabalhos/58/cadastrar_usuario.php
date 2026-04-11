<?php
    ini_set("display_errors",0);
    include 'conexao.php';

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (nome, senha)
            VALUES (:nome, :senha)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <section class="formulario">
        <form action="" method="post">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="">

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="">

            <button type="submit">Enviar</button>

        </form>
    </section>
</body>
</html>