<?php
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_professor = $_POST['id_professor'];
    $materia = $_POST['materia'];


    $sql = "INSERT INTO materias (id_professor, materia)
            VALUES (:id_professor, :materia)";
          
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam('id_professor',$id_professor);
    $stmt->bindParam('materia', $materia);

    if ($stmt->execute()){
        header("Location:cadastra_materia.php");
        exit;
    }else{
        echo "<p>nao deu certo :C</p>";
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
    
</body>
</html>