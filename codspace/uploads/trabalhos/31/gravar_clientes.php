<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $data_nasc $_POST['nacimento'];
    $telefone $_POST['telefone'];
    $email $_POST['email'];

    $sql = "INSERT INTO cadastro (id,nome,nacimento,telefone,email)
             VALUES (:id,:nome,:data_nasc,:telefone,:email)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam('id', $id);   
    $stmt->bindParam('nome', $nome);
    $stmt->bindParam('nacimento', $data_nasc);
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
