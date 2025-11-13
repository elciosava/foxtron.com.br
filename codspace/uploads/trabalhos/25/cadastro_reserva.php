<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_alunos = $_POST['id_alunos'];
    $id_computadores = $_POST['id_computadores'];


    $sql = "INSERT INTO reservas (id_alunos, id_computadores)
                VALUES (:id_alunos, :id_computadores)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_alunos,', $id_alunos);
    $stmt->bindParam(':id_computadores,', $id_computadores);

    if ($stmt->execute()) {
        header("location:cadastro_reserva.php");
        exit;
    }else{
        echo "não deu certo!!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    </style>
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h2>Reservas</h2>
            <form action="" method="post">
                <label form="id_alunos">Alunos:</label>
                <select name="id_alunos" id="">
                    <?php
                    $_sqlalunos = "SELECT * FROM `alunos`";
                    $stmtalunos = $conexao->prepare($sqlalunos);
                    $stmtalunos->execute();

                    while($alunos = $stmtalunos->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$alunos['id']}'>{$alunos['nome']}</option>";
                    }
                 ?>
                </select>
                 <label form="id_computadores">Computadores:</label>
                <select name="id_computadores" id="">
                     <?php
                    $_sqlcomputadores = "SELECT * FROM `computadores`";
                    $stmtcomputadores = $conexao->prepare($sqlcomputadores);
                    $stmtcomputadores->execute();

                    while($computadores = $stmtcomputadores->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$computadores['id']}'>{$computadores['processador']}'>{$computadores['fonte']}
                        '>{$computadores['monitor']}'>{$computadores['numero']}'>{$computadores['placa']}</option>";
                    }
                ?>
            </form>

        </div>
    </div>
</body>
</html>