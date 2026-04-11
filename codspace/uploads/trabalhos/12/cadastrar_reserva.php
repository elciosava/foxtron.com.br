<?php
    include 'conexao.php';

 if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_aluno = $_POST['id_aluno'];
    $id_computador = $_POST['id_computador'];


    $sql = "INSERT INTO reserva (id_aluno, id_computador)
    VALUES (:id_aluno, :id_computador)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_aluno', $id_aluno);
    $stmt->bindParam(':id_computador', $id_computador);

    if ($stmt->execute()){
        header("Location:cadastrar_reserva.php");
        exit;
        echo "<p>Não deu certo :C</p>";
    }
 }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
</head>
<body>
    <form action="" method="post">
        <label for="id_aluno">Alunos</label>
        <select name="id_aluno" id="">
            <?php 
                $sqlaluno = "SELECT * FROM `alunos`";
                $stmtaluno = $conexao->prepare($sqlaluno);
                $stmtaluno->execute();

                while($aluno = $stmtaluno->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$aluno['id']}'>{$aluno['nome']}</option>";
                }
            ?>
        </select>
        <label for="id_computador">Computador</label>
        <select name="id_computador" id="">
            <?php 
                $sqlcomputador = "SELECT * FROM `computador`";
                $stmtcomputador = $conexao->prepare($sqlcomputador);
                $stmtcomputador->execute();

                while($computador = $stmtcomputador->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$computador['id']}'>{$computador['numero']} | {$computador['mesa']}</option>";
                }
            ?>
        </select>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>