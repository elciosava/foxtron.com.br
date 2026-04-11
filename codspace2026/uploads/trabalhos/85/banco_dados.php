<?php
ini_set("display_errors",0);
include 'conexao.php';
$opcoes = $_POST['opcoes'];
$descreva = $_POST['descreva'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sql = "INSERT INTO consultas (tipo_consulta, sql_consulta) VALUES (:tipo_consulta, :sql_consulta)";
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
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
               margin: 30px;
            padding: 10px;
        }

        form {
            width: 500px;
            padding: 50px;
            border: 1px solid #400c29;
             background-color: #e84cb6;
        }


        .insert {
              margin: 30px;
            padding: 10px;
            width: 400px;
            border: #3d092e 1px solid;
            border-radius: 50px;
                background-color: #e8d5e2;
       
        }

        .update {
             margin: 30px;
            padding: 0;
            width: 400px;
            border: #3d092e 1px solid;
                padding: 10px;
                  display: flex;
                   border-radius: 50px;
                       background-color: #e8d5e2;
                 
        }

        .delete {
             margin: 30px;
            padding: 0;
            width: 400px;
            border: #3d092e 1px solid;
                padding: 10px;
                 border-radius: 50px;
                 background-color: #e8d5e2;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <label for="opcoes">Opções</label>
        <select name="opcoes" id="">
            <option value="insert">Insert</option>
            <option value="update">UpDate</option>
            <option value="delete">Delete</option>
        </select>
        <label for="descreva">Escreva seu SQL:</label>
        <textarea name="descreva" id="" cols="50" rows="3"></textarea>

        <button type="submit">Salvar</button>
    </form>

    <div class="insert">
        <?php
        $sql_insert = "SELECT * FROM consultas WHERE tipo_consulta = 'insert'";
        $stmt = $conexao->prepare($sql_insert);
        $stmt->execute();


        if ($stmt->RowCount() > 0) {
            while ($linha_insert = $stmt->fetch(PDO::FETCH_ASSOC)) {
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


        if ($stmt->RowCount() > 0) {
            while ($linha_update = $stmt->fetch(PDO::FETCH_ASSOC)) {
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


        if ($stmt->RowCount() > 0) {
            while ($linha_delete = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo $linha_delete['sql_consulta'];
            }
        }
        ?>
    </div>
</body>

</html>