<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_professores = $_POST['id_professores'];
    $materia = $_POST['materia'];

    $sql = "INSERT INTO materias (materia, id_professores) 
            VALUES (:materia, :id_professores)";
    
    $stmt = $conexao->prepare($sql);  
    $stmt->bindParam(':materia', $materia); 
    $stmt->bindParam(':id_professores', $id_professores);
    
    if ($stmt->execute()){
        header("Location: cadastrar_materia.php");
        exit;
    } else {
        echo "Erro ao salvar: " . implode(", ", $stmt->errorInfo());
    }
}

$sql_professores = "SELECT * FROM `professores`";
$stmt_professores = $conexao->prepare($sql_professores);
$stmt_professores->execute();
$professores = $stmt_professores->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <form action="" method="post">
            <label for="materia">Matéria</label>
            <input type="text" name="materia" id="materia" required>

            <label for="professor">Professor</label>
            <select name="id_professores" id="professor" required>
                <option value="">Selecione um professor</option>
                <?php
                foreach($professores as $professor){
                    echo "<option value='{$professor['id']}'>{$professor['nome']}</option>";
                }
                ?>
            </select>

            <button type="submit" class="submit">Salvar</button>
        </form>
    </section>
</body>
</html>