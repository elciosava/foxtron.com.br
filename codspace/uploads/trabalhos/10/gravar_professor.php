<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $sql = "INSERT INTO professores (nome)
             VALUES (:nome)";
    $stmt = $conexao->prepare($sql);   
    $stmt->bindParam('nome', $nome);
    if ($stmt->execute()){
        header("Location:gravar_professor.php");
        exit;
    }else{
        echo "não deu boa!";
    }
}

?>