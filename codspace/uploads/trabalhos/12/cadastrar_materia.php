<?php
    include 'conexao.php';

    $sql = "SELECT * FROM `professores`";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

 if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_professor = $_POST['id_professor'];
    $materia = $_POST['materia'];


    $sql = "INSERT INTO materias (id_professores, materia)
    VALUES (:id_professor, :materia)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_professor', $id_professor);
    $stmt->bindParam(':materia', $materia);

    if ($stmt->execute()){
        header("Location:cadastrarmatria.php");
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
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="materia">Materia</label>
        <input type="text" name="materia" id="">

        <select name="id_professor" id="">
            <?php 
                while($professor = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$professor['id']}'>{$professor['nome']}</option>";
                }
            ?>
        </select>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>