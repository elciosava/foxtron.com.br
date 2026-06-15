<?php
    //primeiro declarar 4 variáveis principais que são:
    $local = 'localhost';
    $banco = 'aline';
    $usuario = 'root';
    $senha = '';

    //tentamos conectar usando nossas variáveis 
    try{
        $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $erro){
        echo "Deu ruim parça!" . $erro->getMessage();
    }

    $id_tarefa = $_GET['id_tarefa'];

    $sql = "UPDATE tarefas SET status_tarefa = 'CONCLUIDO' WHERE id_tarefa = :id_tarefa";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_tarefa',$id_tarefa);
    $stmt->execute();

    header("Location:aula2805.php");
?>