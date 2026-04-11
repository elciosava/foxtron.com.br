<?php
    include 'conexao.php';

    $sql = "SELECT * FROM `professores`";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $materia = $_POST['materia'];
    $id_professores = $_POST['id_professor'];

    $sql = "INSERT INTO materia (materia, id_professores)
            VALUES (:materia, :id_professor)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':materia', $materia);
    $stmt->bindParam(':id_professor', $id_professores);

    if ($stmt->execute()){
        header("Location:cadastrar_materia.php");
        exit;
    }else{
        echo "Registro não existente";
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
    <section>
        <form action="" method="post">
            <label for="materia">Materia</label>
                <input type="text" name="materia" id="materia" required>

                <select name="id_professor" id="">
                    <?php
                    while($professor = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$professor['id']}'>{$professor['nome']}</option>";
                    }
                    ?>
                </select>
                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
    
</body>
</html>