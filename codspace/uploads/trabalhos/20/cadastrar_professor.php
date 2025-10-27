<?php
include 'conexao.php';

// Inserir novo professor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nome'])) {
        $nome = trim($_POST['nome']);

        $sql = "INSERT INTO professores (nome) VALUES (:nome)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);

        if ($stmt->execute()) {
            // Redireciona para limpar o POST e atualizar a lista
            header("Location: cadastrar_professor.php");
            exit;
        } else {
            echo "<p style='color:red;'>Erro ao cadastrar professor.</p>";
        }
    } else {
        echo "<p style='color:red;'>O campo nome não pode estar vazio.</p>";
    }
}

// Buscar todos os professores
$sql = "SELECT * FROM professores ORDER BY id DESC";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Professor</title>
    <style>
    /* Geral */
    body {
        font-family: 'Arial', sans-serif;
        background: #f0f4f8;
        padding: 40px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        color: #333;
    }

    /* Formulário */
    form {
        margin-bottom: 30px;
        background: #ffffff;
        padding: 25px 30px;
        border-radius: 12px;
        width: 320px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: transform 0.2s ease;
    }

    form:hover {
        transform: translateY(-2px);
    }

    /* Inputs */
    input[type="text"] {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    input[type="text"]:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        outline: none;
    }

    /* Botão */
    button {
        width: 100%;
        padding: 10px 0;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 15px;
        font-weight: bold;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    button:hover {
        background: #0056b3;
        transform: translateY(-1px);
    }

    /* Tabela */
    table {
        border-collapse: collapse;
        width: 60%;
        background: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    th, td {
        border: 1px solid #e0e0e0;
        padding: 12px 15px;
        text-align: left;
        font-size: 14px;
    }

    th {
        background: #f7f9fc;
        font-weight: 600;
    }

    tr:nth-child(even) {
        background: #f9f9f9;
    }

    tr:hover {
        background: #e6f0ff;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        form, table {
            width: 90%;
        }
    }
</style>

</head>
<body>

<h2>Cadastrar Professor</h2>

<form method="POST" action="">
    <label for="nome">Nome do Professor:</label><br>
    <input type="text" name="nome" id="nome" required><br>
    <button type="submit">Salvar</button>
</form>

<h3>Lista de Professores Cadastrados</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
    </tr>
    <?php if (count($professores) > 0): ?>
        <?php foreach ($professores as $prof): ?>
            <tr>
                <td><?= htmlspecialchars($prof['id']) ?></td>
                <td><?= htmlspecialchars($prof['nome']) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="2">Nenhum professor cadastrado.</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>
