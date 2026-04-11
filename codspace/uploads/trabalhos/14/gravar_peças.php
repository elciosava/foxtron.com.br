<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $peca = $_POST['peca'];


    $sql = "INSERT INTO produto (peça)
             VALUES (:peça)";

    $stmt = $conexao->prepare($sql);   
    $stmt->bindParam('peça', $peça);


    if ($stmt->execute()){
        header("Location:/cadastrar_peças.php");
        exit;
    }else{
        echo "não deu boa!";
    }
}

?>