<?php
include 'conexao.php';

$sql = "SELECT professores.nome, materia.materia 
        FROM professores 
        INNER JOIN materias AS materia 
        ON professores.id = materia.id_professores";

$stmt = $conexao->prepare($sql);
$stmt->execute(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Professores e Aulas</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #9adcf7, #2980b9);
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 600px;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
            color: #42a6c2;
            margin-bottom: 30px;
        }

        .resultado {
            display: flex;
            justify-content: space-between;
            border: 1px solid #000;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 6px;
            background-color: #f0f0f0;
        }

        .linha {
            width: 48%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Professores Matérias 📚</h1>
        <?php
        while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='resultado'>";
            echo "<div class='linha'>{$linha['nome']}</div>";
            echo "<div class='linha'>{$linha['materia']}</div>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>