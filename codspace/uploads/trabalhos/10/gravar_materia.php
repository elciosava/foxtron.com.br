<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_professores = $_POST['id_professores'];
    $materia = $_POST['materia'];

    $sql = "INSERT INTO materias (materia, id_professores) 
            VALUES (:materia, :id_professores)";
    
    $stmt = $conexao->prepare($sql);  
    $stmt->bindParam(':materia', $materia); 
    $stmt->bindParam(':id_professores', $id_professores);
    
    if ($stmt->execute()){
        header("Location: gravar_materia.php");
        exit;
    } else {
        echo "Erro ao salvar: " . implode(", ", $stmt->errorInfo());
    }
}
?>