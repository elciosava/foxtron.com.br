<?php
// Reservas de Salas e Laboratórios
include '../conexao/conexao.php';

// Buscar todas as salas
try {
    $sql = "SELECT * FROM salas WHERE status = 'ATIVA' ORDER BY nome ASC";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $salas = [];
}

// Buscar reservas para exibição
$reservas_exibicao = [];
if ($_GET['data'] ?? null) {
    try {
        $data = $_GET['data'];
        $sql = "SELECT r.*, p.nome as professor_nome, s.nome as sala_nome
                FROM reservas r
                LEFT JOIN professores p ON r.professor_id = p.id
                LEFT JOIN salas s ON r.sala_id = s.id
                WHERE r.data_reserva = :data AND r.status = 'CONFIRMADA'
                ORDER BY r.hora_inicio ASC";
        
        $stmt = $conexao->prepare($sql);
        $stmt->execute([':data' => $data]);
        $reservas_exibicao = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $reservas_exibicao = [];
    }
}

// Processar nova reserva
$mensagem = '';
$tipo_mensagem = '';
if (($_POST['acao'] ?? '') === 'reservar') {
    try {
        $sql = "INSERT INTO reservas (professor_id, sala_id, data_reserva, hora_inicio, hora_fim, motivo, status)
                VALUES (:professor_id, :sala_id, :data, :hora_inicio, :hora_fim, :motivo, 'CONFIRMADA')";
        
        $stmt = $conexao->prepare($sql);
        $stmt->execute([
            ':professor_id' => $_POST['professor_id'],
            ':sala_id' => $_POST['sala_id'],
            ':data' => $_POST['data_reserva'],
            ':hora_inicio' => $_POST['hora_inicio'],
            ':hora_fim' => $_POST['hora_fim'],
            ':motivo' => $_POST['motivo']
        ]);
        
        $mensagem = 'Reserva realizada com sucesso!';
        $tipo_mensagem = 'sucesso';
    } catch (PDOException $e) {
        $mensagem = 'Erro ao realizar reserva: ' . $e->getMessage();
        $tipo_mensagem = 'erro';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas de Salas - SENAI Agenda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f6fc;
            margin: 0;
        }

        header {
            background: #1a2041;
            color: #fff;
            padding: 15px 20px;
        }

        header h1 {
            margin: 0;
            font-size: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            padding: 20px 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            font-size: 18px;
            color: #1a2041;
            border-bottom: 2px solid #f0f0ff;
            padding-bottom: 8px;
            margin-bottom: 15px;
        }

        .nav-links {
            margin-bottom: 20px;
        }

        .btn-nav {
            display: inline-block;
            padding: 6px 12px;
            background: #1a2041;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
            margin-right: 5px;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 30px;
        }

        form label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
            font-size: 13px;
        }

        form input, form select, form textarea {
            width: 100%;
            padding: 8px;
            margin-top: 3px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 13px;
            box-sizing: border-box;
        }

        button {
            margin-top: 15px;
            padding: 10px 20px;
            background: #1a2041;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            font-size: 13px;
        }

        button:hover { opacity: .9; }

        .msg {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
        }

        .msg.sucesso { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .msg.erro { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

        .sala-card {
            padding: 12px;
            border: 1px solid #eee;
            border-radius: 6px;
            margin-bottom: 10px;
            background: #f9f9f9;
        }

        .sala-nome { font-weight: bold; color: #1a2041; font-size: 14px; }
        .sala-info { color: #666; font-size: 12px; margin-top: 3px; }
        .sala-tipo {
            display: inline-block;
            background: #1a2041;
            color: #fff;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            margin-right: 5px;
        }

        .reserva-item {
            padding: 10px;
            border-left: 4px solid #1a2041;
            background: #f0f4f8;
            margin-bottom: 10px;
            border-radius: 0 4px 4px 0;
        }

        .reserva-time { font-weight: bold; color: #1a2041; font-size: 13px; }
        .reserva-title { font-weight: bold; font-size: 13px; margin-top: 2px; }
        .reserva-details { font-size: 12px; color: #666; margin-top: 2px; }

        .empty-state { text-align: center; padding: 20px; color: #999; font-size: 13px; }

        @media (max-width: 768px) {
            .grid-2 { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <header>
        <h1>🔖 Reservas de Salas e Laboratórios</h1>
    </header>

    <div class="container">
        <div class="nav-links">
            <a href="dashboard.php" class="btn-nav">Dashboard</a>
            <a href="cursos.php" class="btn-nav">Cursos</a>
            <a href="professores.php" class="btn-nav">Professores</a>
        </div>

        <?php if ($mensagem): ?>
            <div class="msg <?php echo $tipo_mensagem; ?>">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>

        <div class="grid-2">
            <!-- Formulário de Reserva -->
            <div>
                <h2>📝 Nova Reserva</h2>
                <form method="POST">
                    <input type="hidden" name="acao" value="reservar">

                    <label for="professor_id">Professor</label>
                    <select name="professor_id" id="professor_id" required>
                        <option value="">Selecione um professor</option>
                        <?php
                        try {
                            $sql = "SELECT id, nome FROM professores ORDER BY nome ASC";
                            $stmt = $conexao->prepare($sql);
                            $stmt->execute();
                            $professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($professores as $prof):
                        ?>
                        <option value="<?php echo $prof['id']; ?>">
                            <?php echo htmlspecialchars($prof['nome']); ?>
                        </option>
                        <?php endforeach; } catch (Exception $e) {} ?>
                    </select>

                    <label for="sala_id">Sala/Laboratório</label>
                    <select name="sala_id" id="sala_id" required>
                        <option value="">Selecione uma sala</option>
                        <?php foreach ($salas as $sala): ?>
                        <option value="<?php echo $sala['id']; ?>">
                            <?php echo htmlspecialchars($sala['nome']); ?> 
                            (<?php echo $sala['tipo']; ?>)
                        </option>
                        <?php endforeach; ?>
                    </select>

                    <label for="data_reserva">Data</label>
                    <input type="date" name="data_reserva" id="data_reserva" required>

                    <div style="display: flex; gap: 10px;">
                        <div style="flex: 1;">
                            <label for="hora_inicio">Início</label>
                            <input type="time" name="hora_inicio" id="hora_inicio" required>
                        </div>
                        <div style="flex: 1;">
                            <label for="hora_fim">Fim</label>
                            <input type="time" name="hora_fim" id="hora_fim" required>
                        </div>
                    </div>

                    <label for="motivo">Motivo</label>
                    <textarea name="motivo" id="motivo" rows="3" placeholder="Opcional..."></textarea>

                    <button type="submit">Confirmar Reserva</button>
                </form>
            </div>

            <!-- Salas Disponíveis -->
            <div>
                <h2>🏢 Salas Ativas</h2>
                <?php if (count($salas) > 0): ?>
                    <?php foreach ($salas as $sala): ?>
                    <div class="sala-card">
                        <div class="sala-nome"><?php echo htmlspecialchars($sala['nome']); ?></div>
                        <div class="sala-info">
                            <span class="sala-tipo"><?php echo $sala['tipo']; ?></span>
                            <span>👥 <?php echo $sala['capacidade']; ?> lugares</span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-state">Nenhuma sala disponível</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Reservas do Dia -->
        <div style="margin-top: 20px; border-top: 2px solid #f0f0ff; padding-top: 20px;">
            <h2>📅 Consultar Reservas</h2>
            <form method="GET" style="display: flex; gap: 10px; align-items: flex-end; margin-bottom: 20px;">
                <div style="flex: 1;">
                    <label>Data para consulta</label>
                    <input type="date" name="data" value="<?php echo $_GET['data'] ?? date('Y-m-d'); ?>" required>
                </div>
                <button type="submit" style="margin-top: 0;">Buscar</button>
            </form>

            <?php if ($_GET['data'] ?? null): ?>
                <?php if (count($reservas_exibicao) > 0): ?>
                    <?php foreach ($reservas_exibicao as $reserva): ?>
                    <div class="reserva-item">
                        <div class="reserva-time">
                            <?php echo date('H:i', strtotime($reserva['hora_inicio'])); ?> - 
                            <?php echo date('H:i', strtotime($reserva['hora_fim'])); ?>
                        </div>
                        <div class="reserva-title"><?php echo htmlspecialchars($reserva['sala_nome']); ?></div>
                        <div class="reserva-details">
                            👨‍🏫 <?php echo htmlspecialchars($reserva['professor_nome']); ?>
                            <?php if ($reserva['motivo']): ?>
                                <br>📝 <?php echo htmlspecialchars($reserva['motivo']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-state">Nenhuma reserva confirmada para esta data.</div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
