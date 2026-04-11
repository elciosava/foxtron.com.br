<?php
    include 'conexao.php';

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data_inicio = $_POST['data_inicio'];
    $data_final = $_POST['data_final'];

    $sql = "INSERT INTO agenda (titulo, descricao, data_inicio, data_final)
     VALUES (:titulo,:descricao, :data_inicio, :data_final)";

     $smt = $conexao->prepare ($sql);
     $smt->bindParam(':titulo', $titulo);
     $smt->bindParam(':descricao', $descricao);
     $smt->bindParam(':data_inicio', $data_inicio);
     $smt->bindParam(':data_final', $data_final);
     $smt->execute();
?>