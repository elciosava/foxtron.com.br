<?php
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
    <title>Cadastrar Usuário</title>
</head>
<body>
    <section id="formulario">
        <form action="" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="senha">Senha</label>
            <input type="text" name="senha" id="">

            <button type="submit">Enviar</button>
        </form>
    </section>
</body>
</html>