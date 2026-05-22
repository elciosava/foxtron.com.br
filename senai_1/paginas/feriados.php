<?php
require '../conexao/conexao.php';

// Processar o POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_inicio = $_POST['data_inicio'] ?? null;
    $data_fim = $_POST['data_fim'] ?? null;
    $descricao = trim($_POST['descricao'] ?? '');
    $tipo = $_POST['tipo'] ?? 'FERIADO';

    if ($data_inicio && $data_fim && $descricao && in_array($tipo, ['FERIADO', 'FERIAS', 'RECESSO'])) {
        $ini = new DateTime($data_inicio);
        $fim = new DateTime($data_fim);

        // garante que ini <= fim
        if ($ini > $fim) {
            [$ini, $fim] = [$fim, $ini];
        }

        $sql = "INSERT INTO feriados (data, descricao, tipo) VALUES (:data, :descricao, :tipo)";
        $stmt = $conexao->prepare($sql);

        $conexao->beginTransaction();
        try {
            $cursor = clone $ini;
            while ($cursor <= $fim) {
                $stmt->execute([
                    ':data' => $cursor->format('Y-m-d'),
                    ':descricao' => $descricao,
                    ':tipo' => $tipo
                ]);
                $cursor->modify('+1 day');
            }
            $conexao->commit();
            $msg = "Período cadastrado com sucesso!";
        } catch (Exception $e) {
            $conexao->rollBack();
            $msg = "Erro ao cadastrar: " . $e->getMessage();
        }
    } else {
        $msg = "Preencha todas as informações.";
    }
}

// Listar feriados já cadastrados
$sqlLista = "SELECT * FROM feriados ORDER BY data ASC";
$feriados = $conexao->query($sqlLista)->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Feriados / Férias - SENAI Agenda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f6fc;
            margin: 0;
        }

        header {
            background: #1a2041;
            color: #fff;
            padding: 10px 20px;
        }

        header h1 {
            margin: 0;
            font-size: 20px;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        }

        form {
            margin-bottom: 20px;
        }

        form .linha {
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 3px;
        }

        input[type="date"],
        input[type="text"],
        select {
            width: 100%;
            padding: 6px;
            box-sizing: border-box;
        }

        button {
            background: #1a2041;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 4px 6px;
            text-align: left;
        }

        th {
            background: #f0f0ff;
        }

        .tipo-feriado {
            color: #c3002f;
            font-weight: bold;
        }

        .tipo-ferias {
            color: #00796b;
            font-weight: bold;
        }

        .msg {
            margin-bottom: 10px;
            color: #1a2041;
            font-weight: bold;
        }

        .tipo-outro {
            color: #6a1b9a;
            font-weight: bold;
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
    </style>
</head>

<body>
    <header>
        <h1>Feriados / Férias - SENAI Agenda</h1>
        <div>
            <a href="../index.php" class="btn">Lista de Cursos</a>
            <a href="professores.php" class="btn">Gerenciar Professores</a>
            <a href="cursos.php" class="btn">Gerenciar Cursos</a>
        </div>
    </header>

    <div class="container">
        <?php if (!empty($msg)): ?>
            <div class="msg"><?= htmlspecialchars($msg) ?></div>
        <?php endif; ?>

        <h2>Cadastrar feriado ou férias</h2>
        <form method="post">
            <div class="linha">
                <label>Data inicial:</label>
                <input type="date" name="data_inicio" required>
            </div>
            <div class="linha">
                <label>Data final:</label>
                <input type="date" name="data_fim" required>
            </div>
            <div class="linha">
                <label>Descrição:</label>
                <input type="text" name="descricao" placeholder="Ex: Férias de Julho 2026, Natal, etc." required>
            </div>
            <div class="linha">
                <label>Tipo:</label>
                <select name="tipo">
                    <option value="FERIADO">Feriado</option>
                    <option value="RECESSO">Recesso</option>
                    <option value="FERIAS">Férias</option>
                </select>
            </div>
            <button type="submit">Salvar período</button>
        </form>

        <h2>Períodos cadastrados</h2>
        <table>
            <tr>
                <th>Data</th>
                <th>Descrição</th>
                <th>Tipo</th>
            </tr>
            <?php foreach ($feriados as $f): ?>
                <tr>
                    <td><?= date('d/m/Y', strtotime($f['data'])) ?></td>
                    <td><?= htmlspecialchars($f['descricao']) ?></td>
                    <td>
                        <?php if ($f['tipo'] === 'FERIAS'): ?>
                            <span class="tipo-ferias">FÉRIAS</span>

                        <?php elseif ($f['tipo'] === 'OUTRO'): ?>
                            <span class="tipo-outro">OUTRO</span>

                        <?php else: ?>
                            <span class="tipo-feriado">FERIADO</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>