<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $materia = $_POST['materia'];
    $id_professores = $_POST['id_professores'];

    $sql = "INSERT INTO materia (materia, id_professores)
             VALUES (:materia, :id_professores)";

    $stmt = $conexao->prepare($sql);   
    $stmt->bindParam('materia', $materia);
    $stmt->bindParam('id_professores', $id_professores);

    if ($stmt->execute()){
        header("Location:gravar_materia.php");
        exit;
    }else{
        echo "não deu boa!";
    }
}

?>