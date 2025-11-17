<?php
require '../conexao/conexao.php';

$curso_id = $_GET['curso_id'] ?? null;
if (!$curso_id) {
    die("Curso não informado.");
}

// Buscar dados do curso
$sql = "SELECT * FROM cursos WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->execute([':id' => $curso_id]);
$curso = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$curso) {
    die("Curso não encontrado.");
}

// Se enviou o form, grava nova UC
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome   = $_POST['nome'] ?? '';
    $sigla  = $_POST['sigla'] ?? '';
    $carga  = (int)($_POST['carga_horaria'] ?? 0);
    $cor    = $_POST['cor'] ?? '#2196f3';
    $ordem  = (int)($_POST['ordem'] ?? 1);
    $prof   = (int)($_POST['professor_id'] ?? 0);

    if (!empty($nome) && $carga > 0) {
        $sql = "INSERT INTO unidades_curriculares
                (curso_id, professor_id, nome, sigla, carga_horaria, cor, ordem)
                VALUES
                (:curso, :prof, :nome, :sigla, :carga, :cor, :ordem)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([
            ':curso' => $curso_id,
            ':prof'  => $prof ?: null,
            ':nome'  => $nome,
            ':sigla' => $sigla,
            ':carga' => $carga,
            ':cor'   => $cor,
            ':ordem' => $ordem
        ]);
        $msg = "Unidade curricular cadastrada!";
    } else {
        $msg = "Informe pelo menos nome e carga horária.";
    }
}

// Buscar professores para o select
$sql = "SELECT id, nome FROM professores ORDER BY nome";
$stmt = $conexao->query($sql);
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Buscar UCs do curso
$sql = "SELECT u.*, p.nome AS nome_prof
        FROM unidades_curriculares u
        LEFT JOIN professores p ON u.professor_id = p.id
        WHERE u.curso_id = :curso
        ORDER BY u.ordem ASC";
$stmt = $conexao->prepare($sql);
$stmt->execute([':curso' => $curso_id]);
$ucs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Unidades Curriculares - <?= htmlspecialchars($curso['nome']) ?></title>
    <style>
        body { font-family: Arial, sans-serif; background:#f3f6fc; margin:0; }
        header { background:#1a2041; color:#fff; padding:15px 20px; }
        header h1 { margin:0; font-size:20px; }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            background:#fff;
            padding:20px 25px;
            border-radius:8px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        h2 { margin-top:0; }
        form label { display:block; font-weight:bold; margin-top:10px; font-size:13px; }
        form input, form select {
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
        .cor-box {
            display:inline-block;
            width:16px;
            height:16px;
            border-radius:4px;
            border:1px solid #ccc;
            vertical-align:middle;
            margin-right:4px;
        }
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
    </style>
</head>
<body>
<header>
    <h1>Unidades Curriculares - <?= htmlspecialchars($curso['nome']) ?></h1>
</header>

<div class="container">
    <a href="cursos.php" class="btn">Voltar para cursos</a>
    <a href="../paginas/calendario_curso.php?curso_id=<?= $curso_id ?>" class="btn">Ver calendário</a>

    <p>
        <strong>Período:</strong>
        <?= date('d/m/Y', strtotime($curso['data_inicio'])) ?> a
        <?= date('d/m/Y', strtotime($curso['data_fim'])) ?><br>
        <strong>CH total:</strong> <?= (int)$curso['carga_horaria_total'] ?>h
        | <strong>Horas/Dia:</strong> <?= $curso['horas_por_dia'] ?>h
    </p>

    <h2>Nova Unidade Curricular</h2>

    <?php if (!empty($msg)): ?>
        <div class="msg"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>

    <form method="post">
        <label>Nome da UC</label>
        <input type="text" name="nome" required>

        <div class="linha">
            <div>
                <label>Sigla</label>
                <input type="text" name="sigla" placeholder="Ex: LOG.PROG, LP, BDC">
            </div>
            <div>
                <label>Carga horária (h)</label>
                <input type="number" name="carga_horaria" value="40" required>
            </div>
            <div>
                <label>Ordem</label>
                <input type="number" name="ordem" value="<?= count($ucs)+1 ?>">
            </div>
        </div>

        <div class="linha">
            <div>
                <label>Professor</label>
                <select name="professor_id">
                    <option value="0">-- Selecione --</option>
                    <?php foreach ($professores as $p): ?>
                        <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nome']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label>Cor da UC</label>
                <input type="color" name="cor" value="#2196f3">
            </div>
        </div>

        <button type="submit">Cadastrar UC</button>
    </form>

    <h2>UCs cadastradas</h2>
    <table>
        <tr>
            <th>Ordem</th>
            <th>UC</th>
            <th>Carga (h)</th>
            <th>Professor</th>
            <th>Cor</th>
        </tr>
        <?php foreach ($ucs as $uc): ?>
            <tr>
                <td><?= $uc['ordem'] ?></td>
                <td>
                    <strong><?= htmlspecialchars($uc['sigla'] ?: $uc['nome']) ?></strong><br>
                    <small><?= htmlspecialchars($uc['nome']) ?></small>
                </td>
                <td><?= (int)$uc['carga_horaria'] ?></td>
                <td><?= htmlspecialchars($uc['nome_prof'] ?: '—') ?></td>
                <td>
                    <span class="cor-box" style="background:<?= htmlspecialchars($uc['cor'] ?: '#ccc') ?>"></span>
                    <small><?= htmlspecialchars($uc['cor']) ?></small>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
