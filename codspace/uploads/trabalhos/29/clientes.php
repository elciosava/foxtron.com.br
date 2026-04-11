<?php


include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $Cpf = $_POST['cpf'];
    

    $sql = "INSERT INTO clientes (nome, cpf)
             VALUE (:nome, :cpf)";

             $stmt = $conexao->prepare($sql);
             $stmt->bindParam(':nome', $nome);
             $stmt->bindParam(':cpf', $Cpf);
            
             if ($stmt->execute()){
                header("location:clientes.php");
                exit;
             }else{
                echo "nao deu truta";
             }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <form action="" method="post">

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="" >

        <label for="cpf">Cpf</label>
        <input type="number" name="cpf" id="" >

         <button type="submit">Enviar</button>
    </form>
</body>
</html>