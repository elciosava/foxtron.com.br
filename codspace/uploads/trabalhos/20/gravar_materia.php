<?php


include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $nome_materia =$_POST['nome_materia'];
  
    
    $sql = "INSERT INTO materias (materia, id_professores)
    VALUES (:materia,:nome_materia)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':materia', $nome);
     $stmt->bindParam(':nome_materia', $nome_materia);
   

     if($stmt->execute()){
        header("Location:cadastrar_materia.php");
        exit;
     }else{
        echo "Deu Ruim!";
     }
}

?>