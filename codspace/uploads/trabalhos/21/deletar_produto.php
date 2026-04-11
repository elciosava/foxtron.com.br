<?php

    include 'conexao.php';
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];

        if(!empty($id)){
            $sql = "DELETE FROM produtos WHERE id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id', $id);

            if($stmt->execute()){
                echo "Produto deletado com sucesso.";
            }else{
                echo "Produto não foi excluido.";
            }
        }else{
            echo "Erro ID!";

        }
    }

?>