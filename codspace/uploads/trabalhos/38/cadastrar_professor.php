<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Professores</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #2b1055, #7597de);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            color: white;
            margin-top: 20px;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            margin-bottom: 30px;
            width: 300px;
        }
        label {
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 6px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        button {
            background-color: #2b1055;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #3f1b75;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #2b1055;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Cadastro de Professores</h1>

    <form action="gravar_professores.php" method="post">
        <label for="nome">Nome do Professor</label>
        <input type="text" name="nome" id="nome" required>
        <button type="submit">Salvar</button>
    </form>

    <?php
    $sql = "SELECT * FROM professores";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>açao</th></tr>";

        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$linha['id']}</td>";
            echo "<td>" . htmlspecialchars($linha['nome']) . "</td>";
            echo "<td>
                    <form action='editar_professores.php' method='get' style='display:inline;'>
                        <input type='hidden' name='id' value='{$linha['id']}'>
                        <button type='submit'>Editar</button>
                    </form>
                    <form action='deletar_professores.php' method='post' style='display:inline;' onsubmit=\"return confirm('Deseja realmente deletar este professor?');\">
                        <input type='hidden' name='id' value='{$linha['id']}'>
                        <button type='submit'>Deletar</button>
                    </form>
                  </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p style='color:white;'>Nenhum professor cadastrado.</p>";
    }
    ?>
</body>
</html>
