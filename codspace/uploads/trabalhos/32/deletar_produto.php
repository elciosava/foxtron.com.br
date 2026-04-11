<?php
    include 'conexao.php';

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];

            if(!empty($id)){
                $sql = "DELETE FROM produtos WHERE id = :id";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(':id', $id);

                if($stmt->execute()){
                    echo "produto deletado.";
                }else{
                    echo "nao deu pra excluir.";
                }
            }else{
                echo "Erro de ID";
            }
        }
?>