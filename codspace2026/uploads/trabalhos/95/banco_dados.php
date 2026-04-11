<?php
    $opcoes = $_POST['opcoes'];
    $descreva = $_POST['descreva'];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
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
    <form action="opcoes">Opção</form>
    <select name="opcoes" id="">
        <option value="insert">Insert</option>
        <option value="update">update</option>
        <option value="delete">Delete</option>
    </select>
    <label for="descreva">Escreva seu SQL:</label>
    <textarea name="" id="" cols="30" rows="10"></textarea>
     
    <button></button>
</body>
</html>