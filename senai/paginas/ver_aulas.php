<?php
require '../conexao/conexao.php';

$curso_id = $_GET['curso_id'] ?? null;

if ($curso_id) {
    $sql = "SELECT nome FROM cursos WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':id' => $curso_id]);
    $curso = $stmt->fetch(PDO::FETCH_ASSOC);
}

$sql = "SELECT a.*, u.sigla, u.nome AS nome_uc, p.nome AS nome_prof
        FROM aulas a
        JOIN unidades_curriculares u ON a.uc_id = u.id
        JOIN professores p ON a.professor_id = p.id";

$params = [];

if ($curso_id) {
    $sql .= " WHERE a.curso_id = :curso";
    $params[':curso'] = $curso_id;
}

$sql .= " ORDER BY a.data ASC";

$stmt = $conexao->prepare($sql);
$stmt->execute($params);
$aulas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Aulas Geradas</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f3f6fc; margin:0; }
        header { background:#1a2041; color:#fff; padding:15px 20px; }
        header h1 { margin:0; font-size:20px; }
        .container {
            max-width: 1000px;
            margin: 25px auto;
            background:#fff;
            padding:20px 25px;
            border-radius:8px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width:100%;
            border-collapse: collapse;
            font-size:14px;
        }
        th, td {
            border:1px solid #ddd;
            padding:8px;
            text-align:left;
        }
        th {
            background:#f0f0ff;
        }
        a.btn {
            display:inline-block;
            margin-bottom:15px;
            padding:8px 12px;
            background:#1a2041;
            color:#fff;
            text-decoration:none;
            border-radius:6px;
            font-size:14px;
        }
    </style>
</head>
<body>
<header>
    <h1>
        Aulas Geradas
        <?php if (!empty($curso['nome'])): ?>
            - <?= htmlspecialchars($curso['nome']) ?>
        <?php endif; ?>
    </h1>
</header>
<div class="container">
    <a href="../index.php" class="btn">Voltar</a>
    <?php if ($curso_id): ?>
        <a href="calendario_curso.php?curso_id=<?= $curso_id ?>" class="btn">Ver calendário</a>
    <?php endif; ?>


    <table>
        <tr>
            <th>Data</th>
            <th>Horário</th>
            <th>UC</th>
            <th>Professor</th>
        </tr>
        <?php foreach ($aulas as $aula): ?>
            <tr>
                <td><?= date('d/m/Y', strtotime($aula['data'])) ?></td>
                <td><?= substr($aula['hora_inicio'],0,5) ?> às <?= substr($aula['hora_fim'],0,5) ?></td>
                <td><?= htmlspecialchars($aula['sigla'] ?: $aula['nome_uc']) ?></td>
                <td><?= htmlspecialchars($aula['nome_prof']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
