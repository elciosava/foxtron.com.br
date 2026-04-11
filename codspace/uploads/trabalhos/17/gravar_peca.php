<?php

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['peca'];

    $sql = "INSERT INTO peca (peca)
            VALUES (:peca)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':peca', $nome);

    if ($stmt->execute()){
        header("Location:cadastrar_peca.php");
        exit;
    }else{
        echo "não deu boa!";
    }
}

?>