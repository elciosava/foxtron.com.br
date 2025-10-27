<?php
    include 'conexao.php';

    $sql = "SELECT * FROM `professor`";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
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
        <form action="" method="post"></form>
            <label for="materia">Materia</label>
                <input type="text" name="professor" id="professor" required>

                <select name="professor" id="">
                    <?php
                    while($professor = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$professor['id']}'>{$professor['nome']}</option>";
                    }
                    ?>
                </select>
            </form>
        </div>
    </section>
    
</body>
</html>