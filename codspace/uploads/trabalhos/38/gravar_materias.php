<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (!empty($_POST['materias'])) {
        $materias = trim($_POST['materias']);

        try {
            $sql = "INSERT INTO materias (materias) VALUES (:nome)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':materias', $materias, PDO::PARAM_STR);
            $stmt->execute();

            
            header("Location:cadastrar_materia.php");
            exit;
        } catch (PDOException $e) {
            echo "Erro ao gravar matéria: " . htmlspecialchars($e->getMessage());
        }
    } else {
        echo "O campo nome é obrigatório.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>