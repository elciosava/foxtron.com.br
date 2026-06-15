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

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_cliente = $_POST['id_cliente']??null;
    $modelo_carro = $_POST['modelo_carro']??null;
    $marca_carro = $_POST['marca_carro']??null;

    $sql = "INSERT INTO carros (id_cliente, marca_carro, modelo_carro)
    VALUES(:id_cliente, :marca_carro, :modelo_carro)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->bindParam(':marca_carro', $marca_carro);
    $stmt->bindParam(':modelo_carro', $modelo_carro);
    $stmt->execute();
}else{
    echo "falha ao inserir o registro";
}

header("Location:mostraraluguel.php");