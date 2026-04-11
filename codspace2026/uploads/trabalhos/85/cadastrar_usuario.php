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
    <title>Cadastrar Usuario</title>
    <Style>
        * {
            margin: 0;
            padding: 0;
        }
        section {
            width: 100%;
            height: 80px;
            background: pink;
        }
        form {
            display: flex;
            justify-content
        }
    </Style>
</head>
<body>
    <section>
        <form action="" method="get">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="senha">senha</label>
            <input type="text" name="senha" id="">
             <button type="submit">Enviar</button>
        </form>
    </section>
</body>
</html>