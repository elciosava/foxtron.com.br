<?php
$local = 'localhost';
$banco = 'farias';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $erro){
    echo "não rolou!". $erro->getMessage();
}
$id_carro = $_GET['id_carro'];
$sql = "DELETE FROM carros WHERE id_carro = :id_carro";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id_carro',$id_carro);
$stmt->execute();

header("Location:aula0206.php");
?>