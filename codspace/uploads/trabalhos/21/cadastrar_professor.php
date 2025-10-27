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
        body { font-family: Arial, sans-serif; background: #f2f2f2; padding: 30px; }
        form { margin-bottom: 20px; background: #fff; padding: 20px; border-radius: 8px; width: 300px; }
        table { border-collapse: collapse; width: 50%; background: #fff; border-radius: 8px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #eee; }
        input[type="text"] { width: 100%; padding: 8px; }
        button { padding: 8px 12px; margin-top: 8px; background: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
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
