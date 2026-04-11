<?php
ini_set("display_errors", 0);
include 'conexao.php';
    $opcoes = $_POST['opcoes'];
    $descreva = $_POST['descreva'];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $sql = "INSERT INTO consultas (tipo_consulta, sql_consulta)
                VALUES (:tipo_consulta, :sql_consulta)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':tipo_consulta', $opcoes);
        $stmt->bindParam(':sql_consulta', $descreva);
        $stmt->execute();
        
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
       }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="opcoes">Opção</label>
        <select name="opcoes" id="">
            <option value="insert">Insert</option>
            <option value="update">Update</option>
            <option value="delete">Delete</option>
        </select>
        <label for="descreva">Escreva seu SQL:</label>
        <textarea name="descreva" id="" cols="30" rows="10"></textarea>

        <button type="submit">Salvar</button>
    </form>

    <div class="insert">
        <?php
            $sql_insert = "SELECT * FROM consultas WHERE tipo_consulta = 'insert'";
            $stmt = $conexao->prepare($sql_insert);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                while ($linha_insert = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo $linha_insert['sql_consulta'];
                }
            }
        ?>
    </div>
    <div class="update">
        <?php
            $sql_update = "SELECT * FROM consultas WHERE tipo_consulta = 'update'";
            $stmt = $conexao->prepare($sql_update);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                while ($linha_update = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo $linha_update['sql_consulta'];
                }
            }
        ?>
    </div>
    <div class="delete">
        <?php
            $sql_delete = "SELECT * FROM consultas WHERE tipo_consulta = 'delete'";
            $stmt = $conexao->prepare($sql_delete);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                while ($linha_delet = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo $linha_delet['sql_consulta'];
                }
            }
        ?>
    </div>

</body>
</html>