<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $data_nasc $_POST['data_nasc'];
    $telefone $_POST['telefone'];
    $email $_POST['email'];

    $sql = "INSERT INTO cadastro (nome,data_nasc,telefone,email)
             VALUES (:nome,:data_nasc,:telefone,:email)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam('nome', $nome);
    $stmt->bindParam('data_nasc', $data_nasc);
    $stmt->bindParam('telefone', $telefone);
    $stmt->bindParam('email', $email);

    if ($stmt->execute()){
        header("Location:gravar_cliente.php");
        exit;
    }else{
        echo "não deu boa!";
    }
}

?>