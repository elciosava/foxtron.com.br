<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if (!empty($id)) {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "produto deletado.";
        } else { 
            echo "deu ruim";
        }
    } else { 
        echo "Erro de ID";
    }
}
?>
