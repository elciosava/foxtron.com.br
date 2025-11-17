<?php
// cursos.php
include 'conexao/conexao.php';

try {
    $sql = "SELECT * FROM cursos ORDER BY data_inicio";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar cursos: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Cursos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f3f6fc;
            margin: 0;
        }

        header {
            background-color: #1a2041;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 20px;
        }

        header a {
            text-decoration: none;
            color: #1a2041;
            background-color: #ffffff;
            padding: 8px 16px;
            font-weight: bold;
            border-radius: 4px;
        }

        main {
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #1a2041;
            color: #fff;
        }

        tr:hover {
            background-color: #f1f5ff;
        }

        .btn {
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-calendario {
            background-color: #1a2041;
            color: #fff;
        }

        .sem-curso {
            margin-top: 20px;
            padding: 15px;
            background: #fff3cd;
            border: 1px solid #ffeeba;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Calendário de Cursos</h1>
        <!-- Ajuste o link abaixo para a página onde você cadastra cursos -->
        <a href="paginas/cursos.php">+ Novo curso</a>
    </header>

    <main>
        <?php if (count($cursos) === 0): ?>
            <div class="sem-curso">
                Nenhum curso cadastrado ainda. Clique em <strong>+ Novo curso</strong> para cadastrar.
            </div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Curso</th>
                        <th>Carga horária</th>
                        <th>Horas/dia</th>
                        <th>Início</th>
                        <th>Término</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cursos as $curso): ?>
                        <tr>
                            <td><?= htmlspecialchars($curso['id']) ?></td>
                            <td><?= htmlspecialchars($curso['nome']) ?></td>
                            <td><?= htmlspecialchars($curso['carga_horaria_total'] ?? '') ?> h</td>
                            <td><?= htmlspecialchars($curso['horas_por_dia'] ?? '') ?> h</td>
                            <td><?= htmlspecialchars($curso['data_inicio'] ?? '') ?></td>
                            <td><?= htmlspecialchars($curso['data_fim'] ?? '') ?></td>
                            <td>
                                <a class="btn btn-calendario"
                                    href="paginas/calendario_curso.php?curso_id=<?= urlencode($curso['id']) ?>">
                                    Abrir calendário
                                </a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
</body>

</html>