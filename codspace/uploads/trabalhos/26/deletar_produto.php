<?php
   include 'conexao.php';

   if ($_SERVER['REQUEST_METHOD'] === 'POST'){
       $id = $_POST['id'];

       if(!empty($id)){
          $sql = "DELETE FROM produto WHERE id = :id";
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':id', $id);

          if($stmt->execute()){
            echo "Produto apagado da existencia!";
          }else{
            echo "Não foi possível apagar da existencia!";
          }
       }else{
        echo "Erro de ID";
       }
   }

?>