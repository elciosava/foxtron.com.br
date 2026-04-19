<?php
require '../conexao/conexao.php';

// =============================
// 1. CADASTRAR NOVO PROFESSOR
// =============================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome     = $_POST['nome'] ?? '';
    $email    = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $apelido  = $_POST['apelido'] ?? '';

    if (!empty($nome)) {
        $sql = "INSERT INTO professores (nome, email, telefone, apelido)
                VALUES (:nome, :email, :telefone, :apelido)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([
            ':nome'     => $nome,
            ':email'    => $email,
            ':telefone' => $telefone,
            ':apelido'  => $apelido
        ]);
        $msg = "Professor cadastrado com sucesso!";
    } else {
        $msg = "Informe pelo menos o nome do professor.";
    }
}

// =============================
// 2. LISTAR PROFESSORES
// =============================
$sql = "SELECT * FROM professores ORDER BY nome ASC";
$stmt = $conexao->query($sql);
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Professores</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f3f6fc; margin:0; }
        header { background:#1a2041; color:#fff; padding:15px 20px; }
        header h1 { margin:0; font-size:20px; }
        .container {
            max-width: 900px;
            margin: 20px auto;
            background:#fff;
            padding:20px 25px;
            border-radius:8px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        h2 { margin-top:0; }
        form label { display:block; font-weight:bold; margin-top:10px; font-size:13px; }
        form input {
            width:100%;
            padding:8px;
            margin-top:3px;
            border-radius:5px;
            border:1px solid #ccc;
            font-size:13px;
            box-sizing:border-box;
        }
        .linha { display:flex; gap:10px; }
        .linha > div { flex:1; }
        button {
            margin-top:15px;
            padding:8px 15px;
            background:#1a2041;
            color:#fff;
            border:none;
            border-radius:6px;
            font-weight:bold;
            cursor:pointer;
        }
        button:hover { opacity:.9; }
        .msg { margin-top:10px; font-size:13px; color:green; }

        a.btn {
            display:inline-block;
            margin-bottom:15px;
            padding:6px 10px;
            background:#1a2041;
            color:#fff;
            text-decoration:none;
            border-radius:6px;
            font-size:13px;
        }

        table {
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
            font-size:13px;
        }
        th, td {
            border:1px solid #ddd;
            padding:6px;
        }
        th { background:#f0f0ff; }

        .mini {
            font-size:11px;
            color:#555;
        }
    </style>
</head>
<body>
<header>
    <h1>Cadastro de Professores</h1>
</header>

<div class="container">
    <a href="cursos.php" class="btn">Voltar para cursos</a>

    <h2>Novo professor</h2>

    <?php if (!empty($msg)): ?>
        <div class="msg"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>

    <form method="post">
        <label>Nome completo</label>
        <input type="text" name="nome" required>

        <div class="linha">
            <div>
                <label>Apelido (como aparece no calendário)</label>
                <input type="text" name="apelido" placeholder="Ex: Elcio, Amanda, João">
            </div>
            <div>
                <label>Telefone</label>
                <input type="text" name="telefone" placeholder="(42) 9 9999-9999">
            </div>
        </div>

        <label>E-mail</label>
        <input type="email" name="email" placeholder="prof@senai.br">

        <button type="submit">Cadastrar professor</button>
    </form>

    <h2>Professores cadastrados</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Professor</th>
            <th>Contato</th>
        </tr>
        <?php foreach ($professores as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td>
                    <strong><?= htmlspecialchars($p['nome']) ?></strong><br>
                    <?php if (!empty($p['apelido'])): ?>
                        <span class="mini">Apelido: <?= htmlspecialchars($p['apelido']) ?></span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($p['email'])): ?>
                        <div class="mini"><?= htmlspecialchars($p['email']) ?></div>
                    <?php endif; ?>
                    <?php if (!empty($p['telefone'])): ?>
                        <div class="mini"><?= htmlspecialchars($p['telefone']) ?></div>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
