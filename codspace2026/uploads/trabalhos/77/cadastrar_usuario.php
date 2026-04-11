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
    <title>Cadastar Usuário</title>
    <style>

body{
    background-color: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 300px;
}

#formulario{
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    width: 300px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
    
}

#formulario form{
    display: flex;
    flex-direction: column;
}

input{
    margin-bottom: 10px;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ec94ef;
}

button{
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #a800f5;
    color: white;
    cursor: pointer;
}

button:hover{
    background-color:  #d175fc;
}

</style>
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