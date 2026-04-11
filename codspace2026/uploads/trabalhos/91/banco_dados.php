<?php 
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $opcoes = $_POST['opcoes'];
    $descreva = $_POST['descreva'];

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
<title>Consultas Fofas</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #fdf6f0;
        padding: 20px;
    }

    form {
        width: 400px;
        background-color: #ffe4e1;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }

    select, textarea, input, button {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 15px;
        border-radius: 10px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    textarea { resize: none; }

    button {
        background-color: #ff69b4;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #ff85c1;
    }

    .box {
        width: 400px;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 25px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        background-color: #fff0f5;
        text-align: center;
        word-wrap: break-word;
    }

    .insert { border: 2px solid #ffb6c1; }
    .update { border: 2px solid #ff69b4; }
</style>
</head>
<body>

<form action="" method="post">
    <label for="opcoes">Tipo de Consulta:</label>
    <select name="opcoes" id="opcoes">
        <option value="insert">insert</option>
        <option value="update">update</option>
        <option value="delete">delete</option>
    </select>

    <label for="descreva">Escreva seu SQL:</label>
    <textarea name="descreva" id="descreva" cols="30" rows="5"></textarea>

    <button type="submit">Salvar</button>
</form>

<div class="box insert">
    <?php
    $sql_insert = "SELECT * FROM consultas WHERE tipo_consulta = 'insert'";
    $stmt = $conexao->prepare($sql_insert);
    $stmt->execute();

    while ($linha_insert = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $linha_insert['sql_consulta'] . "<br>";
    }
    ?>
</div>

<div class="box update">
    <?php
    $sql_update = "SELECT * FROM consultas WHERE tipo_consulta = 'update'";
    $stmt = $conexao->prepare($sql_update);
    $stmt->execute();

    while ($linha_update = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $linha_update['sql_consulta'] . "<br>";
    }
    ?>
</div>

</body>
</html>