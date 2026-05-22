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
if ($_POST['acao'] ?? null === 'reservar') {
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
        
        $mensagem = '✅ Reserva realizada com sucesso!';
        $tipo_mensagem = 'sucesso';
    } catch (PDOException $e) {
        $mensagem = '❌ Erro ao realizar reserva: ' . $e->getMessage();
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            background: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            color: #333;
            margin-bottom: 5px;
            font-size: 2em;
        }

        header p {
            color: #666;
            font-size: 1.1em;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .panel {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .panel-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            font-size: 1.2em;
            font-weight: bold;
        }

        .panel-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: inherit;
            font-size: 1em;
            transition: border-color 0.3s;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            width: 100%;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        .mensagem {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .mensagem.sucesso {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .mensagem.erro {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .sala-card {
            padding: 15px;
            border: 2px solid #eee;
            border-radius: 5px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .sala-card:hover {
            border-color: #667eea;
            background: #f8f9ff;
        }

        .sala-card.selected {
            border-color: #667eea;
            background: #f0f1ff;
        }

        .sala-nome {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .sala-info {
            color: #666;
            font-size: 0.9em;
        }

        .sala-tipo {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 0.8em;
            margin-right: 5px;
        }

        .reserva-item {
            padding: 15px;
            border-left: 4px solid #667eea;
            background: #f8f9fa;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .reserva-time {
            font-weight: bold;
            color: #667eea;
        }

        .reserva-title {
            font-weight: bold;
            color: #333;
            margin-top: 5px;
        }

        .reserva-details {
            color: #666;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }

        .empty-state-icon {
            font-size: 3em;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .grid-2 {
                grid-template-columns: 1fr;
            }

            header h1 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header>
            <h1>🔖 Reservas de Salas e Laboratórios</h1>
            <p>Reserve salas e laboratórios para suas atividades</p>
        </header>

        <?php if ($mensagem): ?>
        <div class="mensagem <?php echo $tipo_mensagem; ?>">
            <?php echo $mensagem; ?>
        </div>
        <?php endif; ?>

        <div class="grid-2">
            <!-- Formulário de Reserva -->
            <div class="panel">
                <div class="panel-header">📝 Nova Reserva</div>
                <div class="panel-body">
                    <form method="POST">
                        <input type="hidden" name="acao" value="reservar">

                        <div class="form-group">
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
                        </div>

                        <div class="form-group">
                            <label for="sala_id">Sala/Laboratório</label>
                            <select name="sala_id" id="sala_id" required>
                                <option value="">Selecione uma sala</option>
                                <?php foreach ($salas as $sala): ?>
                                <option value="<?php echo $sala['id']; ?>">
                                    <?php echo htmlspecialchars($sala['nome']); ?> 
                                    (<?php echo $sala['tipo']; ?> - <?php echo $sala['capacidade']; ?> lugares)
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="data_reserva">Data</label>
                            <input type="date" name="data_reserva" id="data_reserva" required>
                        </div>

                        <div class="form-group">
                            <label for="hora_inicio">Hora Início</label>
                            <input type="time" name="hora_inicio" id="hora_inicio" required>
                        </div>

                        <div class="form-group">
                            <label for="hora_fim">Hora Fim</label>
                            <input type="time" name="hora_fim" id="hora_fim" required>
                        </div>

                        <div class="form-group">
                            <label for="motivo">Motivo da Reserva</label>
                            <textarea name="motivo" id="motivo" rows="4" placeholder="Descreva o motivo da reserva..."></textarea>
                        </div>

                        <button type="submit">Confirmar Reserva</button>
                    </form>
                </div>
            </div>

            <!-- Salas Disponíveis -->
            <div class="panel">
                <div class="panel-header">🏢 Salas Disponíveis</div>
                <div class="panel-body">
                    <?php if (count($salas) > 0): ?>
                        <?php foreach ($salas as $sala): ?>
                        <div class="sala-card">
                            <div class="sala-nome">
                                <?php echo htmlspecialchars($sala['nome']); ?>
                            </div>
                            <div class="sala-info">
                                <span class="sala-tipo"><?php echo $sala['tipo']; ?></span>
                                <span>👥 <?php echo $sala['capacidade']; ?> lugares</span>
                                <span>📍 Andar <?php echo $sala['andar'] ?? 'N/A'; ?></span>
                            </div>
                            <?php if ($sala['equipamentos']): ?>
                            <div class="sala-info" style="margin-top: 8px; font-size: 0.85em;">
                                <strong>Equipamentos:</strong> <?php echo htmlspecialchars($sala['equipamentos']); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <div class="empty-state-icon">📭</div>
                            <p>Nenhuma sala disponível</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Reservas do Dia -->
        <div style="margin-top: 30px;">
            <div class="panel">
                <div class="panel-header">📅 Visualizar Reservas por Data</div>
                <div class="panel-body">
                    <form method="GET" style="display: flex; gap: 10px; margin-bottom: 20px;">
                        <input type="date" name="data" value="<?php echo $_GET['data'] ?? date('Y-m-d'); ?>" required style="flex: 1;">
                        <button type="submit" style="flex: 0 0 auto; width: auto;">Buscar</button>
                    </form>

                    <?php if ($_GET['data'] ?? null): ?>
                    <h3 style="margin-bottom: 15px; color: #333;">
                        Reservas para <?php echo date('d/m/Y', strtotime($_GET['data'])); ?>
                    </h3>

                    <?php if (count($reservas_exibicao) > 0): ?>
                        <?php foreach ($reservas_exibicao as $reserva): ?>
                        <div class="reserva-item">
                            <div class="reserva-time">
                                <?php echo date('H:i', strtotime($reserva['hora_inicio'])); ?> - 
                                <?php echo date('H:i', strtotime($reserva['hora_fim'])); ?>
                            </div>
                            <div class="reserva-title"><?php echo htmlspecialchars($reserva['sala_nome']); ?></div>
                            <div class="reserva-details">
                                👨‍🏫 <?php echo htmlspecialchars($reserva['professor_nome']); ?><br>
                                📝 <?php echo htmlspecialchars($reserva['motivo'] ?? 'Sem motivo especificado'); ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <div class="empty-state-icon">✅</div>
                            <p>Nenhuma reserva para esta data</p>
                        </div>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
