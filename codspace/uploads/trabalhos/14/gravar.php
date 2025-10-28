<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $materia = $_POST['materia'];
    $id_professor = $_POST['id_professor'];

    $sql = "INSERT INTO produto (materia, id_professor)
             VALUES (:materia, :id_professor)";

    $stmt = $conexao->prepare($sql);   
    $stmt->bindParam('materia', $materia);
    $stmt->bindParam('id_professor', $id_professor);


    if ($stmt->execute()){
        header("Location:/materia_produto.php");
        exit;
    }else{
        echo "não deu boa!";
    }
}

?>