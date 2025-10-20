<?php
include'conexao.php';

if ($_SERVER['REQUESTR_METHOD'] === 'POST'){
    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    if(!empty($nome) && !empty($cidade) && empty($estado)){
        $sql = "INSERT INTO endereco (tipo, nome, numero, bairro, cidade, estado)
        VALUES (:tipo, :nome, :numero, :bairro, :cidade, :estado)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindparam(':tipo',$tipo);
        $stmt->bindparam(':nome',$nome);
        $stmt->bindparam(':numero',$numero);
        $stmt->bindparam(':bairro',$bairro);
        $stmt->bindparam(':cidade',$cidade);
        $stmt->bindparam(':estado',$estado);

        if($stmt->execute()){
            echo "<p style='color:green;'>deu boa!</p>"
        }else{
            echo "<p style='color:red;'>deu ruim</p>"
        }else{
            echo "<p style='color:orange;'>preencha todos os campos</p>"
        }

    }
}