<?php
include 'conexao.php';

$id_tarefa = $_GET['id_tarefa'] ?? null;

if ($id_tarefa) {

    // Atualiza o status da tarefa para concluído (1)
    $sql = "UPDATE tarefas 
            SET estatus_tarefa = 'Concluido' 
            WHERE id_tarefa = :id_tarefa";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_tarefa', $id_tarefa);
    $stmt->execute();
}

header("Location: listatarefas.php");
exit;
?>