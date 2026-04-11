<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD']=== 'GET'){
$id_carro = $_GET['id_carro'];

$delete = "DELETE FROM carros WHERE id_carro = :id_carro";
$stmt = $conexao->prepare($delete);
$stmt->bindParam(':id_carro' , $id_carro);

if ($stmt->execute()){
    $mensagem = "carro foi pro beleleu!!";
}else{
    $messagem = "o carro ente se resusa ligar";
   }
}

?>
