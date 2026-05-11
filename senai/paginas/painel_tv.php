<?php
// Painel TV - Exibição em Tempo Real
include '../conexao/conexao.php';

// Buscar aulas de hoje
$data_hoje = date('Y-m-d');
try {
    $sql = "SELECT a.*, c.nome as curso_nome, p.nome as professor_nome, s.nome as sala_nome
            FROM aulas a
            LEFT JOIN cursos c ON a.curso_id = c.id
            LEFT JOIN professores p ON a.professor_id = p.id
            LEFT JOIN salas s ON a.sala_id = s.id
            WHERE a.data = :data
            ORDER BY a.hora_inicio ASC";
    
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':data' => $data_hoje]);
    $aulas_hoje = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $aulas_hoje = [];
}

// Buscar conflitos
try {
    $sql = "SELECT c.*, p.nome as professor_nome, s.nome as sala_nome
            FROM conflitos c
            LEFT JOIN professores p ON c.professor_id = p.id
            LEFT JOIN salas s ON c.sala_id = s.id
            WHERE c.status = 'DETECTADO'
            ORDER BY c.criado_em DESC
            LIMIT 5";
    
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $conflitos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $conflitos = [];
}

// Determinar aula atual
$aula_atual = null;
$hora_atual = date('H:i:s');
foreach ($aulas_hoje as $aula) {
    if ($hora_atual >= $aula['hora_inicio'] && $hora_atual <= $aula['hora_fim']) {
        $aula_atual = $aula;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel TV - SENAI Agenda</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: white;
            overflow: hidden;
            height: 100vh;
        }

        header {
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        .header-left h1 {
            font-size: 2.5em;
            margin-bottom: 5px;
        }

        .header-left p {
            color: #bbb;
            font-size: 1.2em;
        }

        .header-right {
            text-align: right;
        }

        #tv-clock {
            font-size: 4em;
            font-weight: bold;
            font-family: 'Courier New', monospace;
            margin-bottom: 5px;
        }

        .refresh-info {
            color: #888;
            font-size: 0.9em;
        }

        main {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 30px;
            padding: 30px;
            height: calc(100vh - 180px);
            overflow: hidden;
        }

        .panel {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 25px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .panel-header {
            font-size: 1.8em;
            font-weight: bold;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .panel-content {
            flex: 1;
            overflow-y: auto;
            padding-right: 15px;
        }

        .panel-content::-webkit-scrollbar {
            width: 8px;
        }

        .panel-content::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }

        .panel-content::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        .panel-content::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .event-item {
            background: rgba(255, 255, 255, 0.05);
            border-left: 5px solid #667eea;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .event-item.current {
            background: rgba(102, 126, 234, 0.2);
            border-left-color: #667eea;
            animation: pulse 2s infinite;
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.8;
            }
        }

        .event-item.current::before {
            content: '🟢 AO VIVO';
            display: block;
            color: #667eea;
            font-size: 1em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .event-time {
            font-weight: bold;
            font-size: 1.3em;
            color: #667eea;
            margin-bottom: 8px;
        }

        .event-title {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .event-details {
            font-size: 1.1em;
            color: #ccc;
            line-height: 1.6;
        }

        .event-details p {
            margin: 5px 0;
        }

        .alert-item {
            background: rgba(239, 68, 68, 0.2);
            border: 2px solid rgba(239, 68, 68, 0.5);
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 100% {
                border-color: rgba(239, 68, 68, 0.5);
            }
            50% {
                border-color: rgba(239, 68, 68, 0.8);
            }
        }

        .alert-label {
            color: #ff6b6b;
            font-size: 1em;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .alert-title {
            font-size: 1.2em;
            font-weight: bold;
            color: #fca5a5;
        }

        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: #666;
        }

        .empty-state-icon {
            font-size: 4em;
            margin-bottom: 15px;
        }

        .empty-state-text {
            font-size: 1.3em;
        }

        footer {
            background: rgba(0, 0, 0, 0.3);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 15px 30px;
            text-align: center;
            color: #888;
            font-size: 0.95em;
        }

        .current-class-highlight {
            background: rgba(102, 126, 234, 0.3);
            border: 2px solid #667eea;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 20px;
        }

        .current-class-highlight h2 {
            font-size: 2.5em;
            margin-bottom: 15px;
            color: #667eea;
        }

        .current-class-highlight p {
            font-size: 1.3em;
            color: #ccc;
            margin: 8px 0;
        }

        @media (max-width: 1400px) {
            main {
                grid-template-columns: 1fr;
            }

            header {
                padding: 20px;
            }

            #tv-clock {
                font-size: 3em;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-left">
            <h1>📺 Painel de Agenda em Tempo Real</h1>
            <p id="tv-date"></p>
        </div>
        <div class="header-right">
            <div id="tv-clock">00:00:00</div>
            <div class="refresh-info">Atualizado há <span id="refresh-count">0</span>s</div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Aula Atual em Destaque + Agenda -->
        <div>
            <?php if ($aula_atual): ?>
            <div class="current-class-highlight">
                <h2>🟢 AULA EM ANDAMENTO</h2>
                <p><strong><?php echo htmlspecialchars($aula_atual['curso_nome']); ?></strong></p>
                <p>👨‍🏫 <?php echo htmlspecialchars($aula_atual['professor_nome']); ?></p>
                <p>🏢 <?php echo htmlspecialchars($aula_atual['sala_nome']); ?></p>
                <p>🕐 <?php echo date('H:i', strtotime($aula_atual['hora_inicio'])); ?> - <?php echo date('H:i', strtotime($aula_atual['hora_fim'])); ?></p>
            </div>
            <?php endif; ?>

            <div class="panel">
                <div class="panel-header">📅 Agenda do Dia</div>
                <div class="panel-content">
                    <?php if (count($aulas_hoje) > 0): ?>
                        <?php foreach ($aulas_hoje as $aula):
                            $hora_inicio = strtotime($aula['hora_inicio']);
                            $hora_fim = strtotime($aula['hora_fim']);
                            $hora_agora = strtotime(date('H:i:s'));
                            $is_current = $hora_agora >= $hora_inicio && $hora_agora <= $hora_fim;
                        ?>
                        <div class="event-item <?php echo $is_current ? 'current' : ''; ?>">
                            <div class="event-time">
                                <?php echo date('H:i', $hora_inicio); ?> - <?php echo date('H:i', $hora_fim); ?>
                            </div>
                            <div class="event-title"><?php echo htmlspecialchars($aula['curso_nome']); ?></div>
                            <div class="event-details">
                                <p>👨‍🏫 <?php echo htmlspecialchars($aula['professor_nome']); ?></p>
                                <p>🏢 <?php echo htmlspecialchars($aula['sala_nome']); ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <div class="empty-state-icon">📭</div>
                            <div class="empty-state-text">Nenhuma aula agendada para hoje</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Alertas e Conflitos -->
        <div class="panel">
            <div class="panel-header">⚠️ Alertas</div>
            <div class="panel-content">
                <?php if (count($conflitos) > 0): ?>
                    <?php foreach ($conflitos as $conflito): ?>
                    <div class="alert-item">
                        <div class="alert-label">🚨 CONFLITO</div>
                        <div class="alert-title"><?php echo htmlspecialchars($conflito['tipo_conflito']); ?></div>
                        <p style="color: #ccc; margin-top: 8px;">
                            <?php echo htmlspecialchars($conflito['professor_nome']); ?><br>
                            <?php echo htmlspecialchars($conflito['descricao']); ?>
                        </p>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-state">
                        <div class="empty-state-icon">✅</div>
                        <div class="empty-state-text">Nenhum conflito detectado</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Próximas Aulas -->
        <div class="panel">
            <div class="panel-header">⏭️ Próximas</div>
            <div class="panel-content">
                <?php
                $proximas = array_filter($aulas_hoje, function($a) {
                    return strtotime($a['hora_inicio']) > strtotime(date('H:i:s'));
                });
                
                if (count($proximas) > 0):
                    foreach (array_slice($proximas, 0, 5) as $aula):
                ?>
                <div class="event-item">
                    <div class="event-time">
                        <?php echo date('H:i', strtotime($aula['hora_inicio'])); ?>
                    </div>
                    <div class="event-title"><?php echo htmlspecialchars($aula['curso_nome']); ?></div>
                    <div class="event-details">
                        <p>👨‍🏫 <?php echo htmlspecialchars($aula['professor_nome']); ?></p>
                        <p>🏢 <?php echo htmlspecialchars($aula['sala_nome']); ?></p>
                    </div>
                </div>
                <?php endforeach; else: ?>
                    <div class="empty-state">
                        <div class="empty-state-icon">✅</div>
                        <div class="empty-state-text">Sem aulas próximas</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>Sistema de Gestão de Agenda - Atualização automática a cada 30 segundos</p>
    </footer>

    <script>
        // Atualizar hora
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('tv-clock').textContent = `${hours}:${minutes}:${seconds}`;
        }

        // Atualizar data
        function updateDate() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('tv-date').textContent = now.toLocaleDateString('pt-BR', options);
        }

        // Atualizar contador de refresh
        let refreshCount = 0;
        function updateRefreshCount() {
            refreshCount++;
            if (refreshCount >= 30) {
                refreshCount = 0;
                location.reload();
            }
            document.getElementById('refresh-count').textContent = refreshCount;
        }

        // Inicializar
        document.addEventListener('DOMContentLoaded', function() {
            updateClock();
            updateDate();
            setInterval(updateClock, 1000);
            setInterval(updateRefreshCount, 1000);
        });
    </script>
</body>
</html>
