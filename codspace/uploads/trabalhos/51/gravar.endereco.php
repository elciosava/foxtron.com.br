<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade= $_POST['cidade'];
    $estado = $_POST['estado'];
}
    if(!empty($nome) && !empty($cidade) && !empty($estado)){
        $sql = "INSERT INTO endereco (tipo, nome, numero, bairro, cidade, estado)
        VALUES (:tipo, :nome, :numero, :bairro, :cidade, :estado)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);

        if($stmt ->execute()){
            echo "<p style='color:green;'>Deu boa!!</p>";
        }else{
            echo "<p style='color:red;'>Deu ruim!!</p>";
        }
        }else{
            echo "<p style='color:orange;'>Preencha todos os campos!</p>";
    }

?>
