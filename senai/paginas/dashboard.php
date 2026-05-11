<?php
// Dashboard - Página Principal
include '../conexao/conexao.php';

// Obter data atual
$data_hoje = date('Y-m-d');
$dia_semana = strftime('%A', strtotime($data_hoje));
$data_formatada = strftime('%d de %B de %Y', strtotime($data_hoje));

// Buscar aulas de hoje
try {
    $sql = "SELECT a.*, c.nome as curso_nome, p.nome as professor_nome, s.nome as sala_nome, s.tipo as sala_tipo
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

// Buscar próximas aulas (próximos 7 dias)
try {
    $data_futura = date('Y-m-d', strtotime('+7 days'));
    $sql = "SELECT a.*, c.nome as curso_nome, p.nome as professor_nome, s.nome as sala_nome
            FROM aulas a
            LEFT JOIN cursos c ON a.curso_id = c.id
            LEFT JOIN professores p ON a.professor_id = p.id
            LEFT JOIN salas s ON a.sala_id = s.id
            WHERE a.data > :data AND a.data <= :data_futura
            ORDER BY a.data ASC, a.hora_inicio ASC
            LIMIT 10";
    
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':data' => $data_hoje, ':data_futura' => $data_futura]);
    $proximas_aulas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $proximas_aulas = [];
}

// Buscar conflitos detectados
try {
    $sql = "SELECT c.*, p.nome as professor_nome, s.nome as sala_nome, s2.nome as sala_sugerida
            FROM conflitos c
            LEFT JOIN professores p ON c.professor_id = p.id
            LEFT JOIN salas s ON c.sala_id = s.id
            LEFT JOIN salas s2 ON c.sala_sugerida_id = s2.id
            WHERE c.status = 'DETECTADO'
            ORDER BY c.criado_em DESC
            LIMIT 5";
    
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $conflitos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $conflitos = [];
}

// Buscar ocupação de salas hoje
try {
    $sql = "SELECT s.id, s.nome, s.tipo, s.capacidade, COUNT(a.id) as aulas_hoje
            FROM salas s
            LEFT JOIN aulas a ON s.id = a.sala_id AND a.data = :data
            WHERE s.status = 'ATIVA'
            GROUP BY s.id
            ORDER BY s.nome ASC";
    
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':data' => $data_hoje]);
    $ocupacao_salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $ocupacao_salas = [];
}

// Calcular estatísticas
$total_aulas_hoje = count($aulas_hoje);
$total_salas_ativas = count($ocupacao_salas);
$salas_ocupadas = count(array_filter($ocupacao_salas, function($s) { return $s['aulas_hoje'] > 0; }));
$taxa_ocupacao = $total_salas_ativas > 0 ? round(($salas_ocupadas / $total_salas_ativas) * 100) : 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SENAI Agenda</title>
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
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            color: #666;
            font-size: 0.9em;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .card-value {
            font-size: 2.5em;
            font-weight: bold;
            color: #667eea;
        }

        .card-subtitle {
            color: #999;
            font-size: 0.9em;
            margin-top: 10px;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 20px;
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
            max-height: 400px;
            overflow-y: auto;
        }

        .event-item {
            padding: 15px;
            border-left: 4px solid #667eea;
            margin-bottom: 15px;
            background: #f8f9fa;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .event-item:hover {
            background: #f0f1ff;
            transform: translateX(5px);
        }

        .event-time {
            font-weight: bold;
            color: #667eea;
            font-size: 0.95em;
        }

        .event-title {
            font-weight: bold;
            color: #333;
            margin-top: 5px;
        }

        .event-details {
            color: #666;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .alert-item {
            padding: 15px;
            border-left: 4px solid #ff6b6b;
            margin-bottom: 15px;
            background: #ffe0e0;
            border-radius: 4px;
        }

        .alert-label {
            color: #ff6b6b;
            font-weight: bold;
            font-size: 0.85em;
            text-transform: uppercase;
        }

        .alert-message {
            color: #333;
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

        .ocupacao-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .ocupacao-item:last-child {
            border-bottom: none;
        }

        .ocupacao-nome {
            font-weight: 500;
            color: #333;
        }

        .ocupacao-badge {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: bold;
        }

        .ocupacao-badge.livre {
            background: #e3f2fd;
            color: #1565c0;
        }

        @media (max-width: 768px) {
            .grid-3 {
                grid-template-columns: 1fr;
            }

            header h1 {
                font-size: 1.5em;
            }

            .card-value {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header>
            <h1>📅 Dashboard</h1>
            <p><?php echo ucfirst($dia_semana); ?> - <?php echo $data_formatada; ?></p>
        </header>

        <!-- Métricas -->
        <div class="grid-2">
            <div class="card">
                <div class="card-title">Aulas Hoje</div>
                <div class="card-value"><?php echo $total_aulas_hoje; ?></div>
                <div class="card-subtitle">agendadas para hoje</div>
            </div>

            <div class="card">
                <div class="card-title">Salas Ocupadas</div>
                <div class="card-value"><?php echo $salas_ocupadas; ?>/<?php echo $total_salas_ativas; ?></div>
                <div class="card-subtitle"><?php echo $taxa_ocupacao; ?>% de ocupação</div>
            </div>

            <div class="card">
                <div class="card-title">Conflitos Detectados</div>
                <div class="card-value"><?php echo count($conflitos); ?></div>
                <div class="card-subtitle">aguardando resolução</div>
            </div>

            <div class="card">
                <div class="card-title">Próximas Aulas</div>
                <div class="card-value"><?php echo count($proximas_aulas); ?></div>
                <div class="card-subtitle">próximos 7 dias</div>
            </div>
        </div>

        <!-- Painéis Principais -->
        <div class="grid-3">
            <!-- Aulas de Hoje -->
            <div class="panel">
                <div class="panel-header">🕐 Aulas de Hoje</div>
                <div class="panel-body">
                    <?php if (count($aulas_hoje) > 0): ?>
                        <?php foreach ($aulas_hoje as $aula): ?>
                        <div class="event-item">
                            <div class="event-time">
                                <?php echo date('H:i', strtotime($aula['hora_inicio'])); ?> - 
                                <?php echo date('H:i', strtotime($aula['hora_fim'])); ?>
                            </div>
                            <div class="event-title"><?php echo htmlspecialchars($aula['curso_nome'] ?? 'Curso'); ?></div>
                            <div class="event-details">
                                👨‍🏫 <?php echo htmlspecialchars($aula['professor_nome'] ?? 'Sem professor'); ?><br>
                                🏢 <?php echo htmlspecialchars($aula['sala_nome'] ?? 'Sem sala'); ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <div class="empty-state-icon">📭</div>
                            <p>Nenhuma aula agendada para hoje</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Próximas Aulas -->
            <div class="panel">
                <div class="panel-header">📆 Próximas Aulas</div>
                <div class="panel-body">
                    <?php if (count($proximas_aulas) > 0): ?>
                        <?php foreach ($proximas_aulas as $aula): ?>
                        <div class="event-item">
                            <div class="event-time">
                                <?php echo date('d/m H:i', strtotime($aula['data'] . ' ' . $aula['hora_inicio'])); ?>
                            </div>
                            <div class="event-title"><?php echo htmlspecialchars($aula['curso_nome'] ?? 'Curso'); ?></div>
                            <div class="event-details">
                                👨‍🏫 <?php echo htmlspecialchars($aula['professor_nome'] ?? 'Sem professor'); ?><br>
                                🏢 <?php echo htmlspecialchars($aula['sala_nome'] ?? 'Sem sala'); ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <div class="empty-state-icon">✅</div>
                            <p>Nenhuma aula nos próximos 7 dias</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Alertas e Conflitos -->
            <div class="panel">
                <div class="panel-header">⚠️ Alertas e Conflitos</div>
                <div class="panel-body">
                    <?php if (count($conflitos) > 0): ?>
                        <?php foreach ($conflitos as $conflito): ?>
                        <div class="alert-item">
                            <div class="alert-label">🚨 <?php echo htmlspecialchars($conflito['tipo_conflito']); ?></div>
                            <div class="alert-message">
                                <strong><?php echo htmlspecialchars($conflito['professor_nome']); ?></strong><br>
                                <?php echo htmlspecialchars($conflito['descricao']); ?>
                                <?php if ($conflito['sala_sugerida']): ?>
                                <br><em>💡 Sugestão: <?php echo htmlspecialchars($conflito['sala_sugerida']); ?></em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <div class="empty-state-icon">✅</div>
                            <p>Nenhum conflito detectado</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Ocupação de Salas -->
            <div class="panel">
                <div class="panel-header">🏢 Ocupação de Salas</div>
                <div class="panel-body">
                    <?php if (count($ocupacao_salas) > 0): ?>
                        <?php foreach ($ocupacao_salas as $sala): ?>
                        <div class="ocupacao-item">
                            <div class="ocupacao-nome"><?php echo htmlspecialchars($sala['nome']); ?></div>
                            <div class="ocupacao-badge <?php echo $sala['aulas_hoje'] == 0 ? 'livre' : ''; ?>">
                                <?php echo $sala['aulas_hoje']; ?> aula<?php echo $sala['aulas_hoje'] != 1 ? 's' : ''; ?>
                            </div>
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

            <!-- Atalhos Rápidos -->
            <div class="panel">
                <div class="panel-header">⚡ Atalhos Rápidos</div>
                <div class="panel-body">
                    <div style="display: grid; gap: 10px;">
                        <a href="calendario_curso.php" style="display: block; padding: 15px; background: #667eea; color: white; text-decoration: none; border-radius: 5px; text-align: center; font-weight: bold; transition: all 0.3s;">
                            📅 Ver Calendário
                        </a>
                        <a href="agenda_professores.php" style="display: block; padding: 15px; background: #764ba2; color: white; text-decoration: none; border-radius: 5px; text-align: center; font-weight: bold; transition: all 0.3s;">
                            👨‍🏫 Agenda Professores
                        </a>
                        <a href="reservas.php" style="display: block; padding: 15px; background: #f59e0b; color: white; text-decoration: none; border-radius: 5px; text-align: center; font-weight: bold; transition: all 0.3s;">
                            🔖 Reservar Sala
                        </a>
                    </div>
                </div>
            </div>

            <!-- Estatísticas -->
            <div class="panel">
                <div class="panel-header">📊 Estatísticas</div>
                <div class="panel-body">
                    <div class="ocupacao-item">
                        <span>Total de Salas</span>
                        <strong><?php echo $total_salas_ativas; ?></strong>
                    </div>
                    <div class="ocupacao-item">
                        <span>Salas Ocupadas</span>
                        <strong><?php echo $salas_ocupadas; ?></strong>
                    </div>
                    <div class="ocupacao-item">
                        <span>Taxa de Ocupação</span>
                        <strong><?php echo $taxa_ocupacao; ?>%</strong>
                    </div>
                    <div class="ocupacao-item">
                        <span>Aulas Hoje</span>
                        <strong><?php echo $total_aulas_hoje; ?></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
