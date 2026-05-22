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
        body {
            font-family: Arial, sans-serif;
            background: #1a2041;
            color: #fff;
            margin: 0;
            overflow: hidden;
            height: 100vh;
        }

        header {
            background: #ffd900;
            color: #1a2041;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 4px solid #fff;
        }

        .header-left h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }

        .header-left p {
            margin: 5px 0 0 0;
            font-size: 18px;
            font-weight: bold;
        }

        .header-right {
            text-align: right;
        }

        #tv-clock {
            font-size: 48px;
            font-weight: bold;
            font-family: monospace;
        }

        main {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 20px;
            padding: 20px;
            height: calc(100vh - 140px);
        }

        .panel {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .panel-header {
            background: rgba(255, 255, 255, 0.2);
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .panel-content {
            flex: 1;
            overflow-y: auto;
            padding: 15px;
        }

        .event-item {
            background: #fff;
            color: #1a2041;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            border-left: 8px solid #ffd900;
        }

        .event-item.current {
            background: #ffd900;
            border-left-color: #fff;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }

        .event-time {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 5px;
        }

        .event-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .event-details {
            font-size: 18px;
            opacity: 0.9;
        }

        .alert-item {
            background: #c62828;
            color: #fff;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 2px solid #fff;
        }

        .alert-label {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .alert-title {
            font-size: 18px;
            font-weight: bold;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            opacity: 0.5;
            font-size: 18px;
        }

        .current-class-highlight {
            background: #ffd900;
            color: #1a2041;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 20px;
            border: 4px solid #fff;
        }

        .current-class-highlight h2 {
            margin: 0 0 10px 0;
            font-size: 24px;
        }

        .current-class-highlight p {
            font-size: 20px;
            margin: 5px 0;
            font-weight: bold;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #ffd900;
            color: #1a2041;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-left">
            <h1>SISTEMA DE AGENDA SENAI</h1>
            <p id="tv-date"></p>
        </div>
        <div class="header-right">
            <div id="tv-clock">00:00:00</div>
        </div>
    </header>

    <main>
        <div>
            <?php if ($aula_atual): ?>
            <div class="current-class-highlight">
                <h2>🟢 AULA EM ANDAMENTO</h2>
                <p><?php echo htmlspecialchars($aula_atual['curso_nome']); ?></p>
                <p>👨‍🏫 <?php echo htmlspecialchars($aula_atual['professor_nome']); ?> | 🏢 <?php echo htmlspecialchars($aula_atual['sala_nome']); ?></p>
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
                                👨‍🏫 <?php echo htmlspecialchars($aula['professor_nome']); ?> | 🏢 <?php echo htmlspecialchars($aula['sala_nome']); ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">Nenhuma aula agendada para hoje</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-header">⚠️ Alertas</div>
            <div class="panel-content">
                <?php if (count($conflitos) > 0): ?>
                    <?php foreach ($conflitos as $conflito): ?>
                    <div class="alert-item">
                        <div class="alert-label">🚨 CONFLITO</div>
                        <div class="alert-title"><?php echo htmlspecialchars($conflito['tipo_conflito']); ?></div>
                        <p style="margin-top: 8px; font-size: 16px;">
                            <?php echo htmlspecialchars($conflito['professor_nome']); ?><br>
                            <?php echo htmlspecialchars($conflito['descricao']); ?>
                        </p>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-state">Nenhum conflito detectado</div>
                <?php endif; ?>
            </div>
        </div>

        <div class="panel">
            <div class="panel-header">⏭️ Próximas Aulas</div>
            <div class="panel-content">
                <?php
                $proximas = array_filter($aulas_hoje, function($a) {
                    return strtotime($a['hora_inicio']) > strtotime(date('H:i:s'));
                });
                
                if (count($proximas) > 0):
                    foreach (array_slice($proximas, 0, 5) as $aula):
                ?>
                <div class="event-item">
                    <div class="event-time"><?php echo date('H:i', strtotime($aula['hora_inicio'])); ?></div>
                    <div class="event-title"><?php echo htmlspecialchars($aula['curso_nome']); ?></div>
                    <div class="event-details">
                        👨‍🏫 <?php echo htmlspecialchars($aula['professor_nome']); ?><br>
                        🏢 <?php echo htmlspecialchars($aula['sala_nome']); ?>
                    </div>
                </div>
                <?php endforeach; else: ?>
                    <div class="empty-state">Sem aulas próximas</div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer>
        Sistema de Gestão de Agenda SENAI - Atualização automática
    </footer>

    <script>
        function updateClock() {
            const now = new Date();
            document.getElementById('tv-clock').textContent = now.toLocaleTimeString('pt-BR');
        }

        function updateDate() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('tv-date').textContent = now.toLocaleDateString('pt-BR', options).toUpperCase();
        }

        setInterval(updateClock, 1000);
        updateClock();
        updateDate();

        // Recarregar a página a cada 30 segundos
        setTimeout(() => {
            window.location.reload();
        }, 30000);
    </script>
</body>
</html>
