<?php 
include 'conexao.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $peca = $_POST['peca'];
        $quantidade = $_POST['quantidade'];

        $insert = "INSERT INTO peca ( `peca`, `quantidade`)
                VALUES ( :peca, :quantidade)";
        $stmt = $conexao->prepare($insert);
        $stmt->bindParam(':peca', $peca);
        $stmt->bindParam(':quantidade', $quantidade);
        

        if ( $stmt->execute()){
            $mensagem = "usuario cadastro com sucesso";
        } else {
            $mensagem = "nao deu boa o brique...";
        }
    }

    

?>