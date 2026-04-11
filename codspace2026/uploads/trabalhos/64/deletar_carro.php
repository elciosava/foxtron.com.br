<?php
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        $id_carro = $_GET['id_carro'];

        $delete = "DELETE FROM carros WHERE id_carro = :id_carro";
        $stmt = $conexao->prepare($delete);
        $stmt->bindParam(':id_carro', $id_carro);

        if ($stmt->execute()){
            $mensagem = "Cliente vai ter que torcer pro Santos!!!";
        }else{
            $mensagem = "O cliente se recusa a torcer pro Santos!!!";
        }
    }

?>