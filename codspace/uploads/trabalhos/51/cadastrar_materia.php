<?php
include 'conexao.php';

  $sql = "SELECT * FROM professores";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     
    <form action="" method="">
        <label for="materia">Materia</label>
        <input type="text" name="materia" id="">

        <select name="professor" id="">

 <?php

        while($professor = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='{$professor['id']}'>{$professor['nome']}</option>";
        }

        ?>
     </select>
       <button type="submit">Salvar</button>
</body>
</html>
