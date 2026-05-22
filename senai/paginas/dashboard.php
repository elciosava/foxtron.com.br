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

        header p {
            margin: 5px 0 0 0;
            font-size: 13px;
            opacity: 0.8;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .card {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            border: 1px solid #e0e0e0;
        }

        .card-title {
            color: #666;
            font-size: 11px;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .card-value {
            font-size: 24px;
            font-weight: bold;
            color: #1a2041;
        }

        .card-subtitle {
            color: #999;
            font-size: 11px;
            margin-top: 5px;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .panel {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            border: 1px solid #e0e0e0;
            display: flex;
            flex-direction: column;
        }

        .panel-header {
            background: #f0f0ff;
            padding: 12px 15px;
            font-size: 14px;
            font-weight: bold;
            color: #1a2041;
            border-bottom: 1px solid #e0e0e0;
            border-radius: 8px 8px 0 0;
        }

        .panel-body {
            padding: 15px;
            max-height: 400px;
            overflow-y: auto;
        }

        .event-item {
            padding: 10px;
            border-left: 3px solid #1a2041;
            margin-bottom: 10px;
            background: #f9f9f9;
            border-radius: 0 4px 4px 0;
        }

        .event-time {
            font-weight: bold;
            color: #1a2041;
            font-size: 12px;
        }

        .event-title {
            font-weight: bold;
            color: #333;
            margin-top: 3px;
            font-size: 13px;
        }

        .event-details {
            color: #666;
            font-size: 11px;
            margin-top: 3px;
        }

        .alert-item {
            padding: 10px;
            border-left: 3px solid #c62828;
            margin-bottom: 10px;
            background: #fff5f5;
            border-radius: 0 4px 4px 0;
        }

        .alert-label {
            color: #c62828;
            font-weight: bold;
            font-size: 11px;
            text-transform: uppercase;
        }

        .alert-message {
            color: #333;
            margin-top: 3px;
            font-size: 12px;
        }

        .empty-state {
            text-align: center;
            padding: 20px;
            color: #999;
            font-size: 13px;
        }

        .ocupacao-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
            font-size: 12px;
        }

        .ocupacao-item:last-child {
            border-bottom: none;
        }

        .ocupacao-nome {
            font-weight: bold;
            color: #333;
        }

        .ocupacao-badge {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 10px;
            font-weight: bold;
        }

        .ocupacao-badge.livre {
            background: #e3f2fd;
            color: #1565c0;
        }

        .nav-links {
            margin-bottom: 20px;
        }

        .btn {
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

        .btn:hover {
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .grid-3 {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>📅 Dashboard de Agenda</h1>
        <p><?php echo ucfirst($dia_semana); ?> - <?php echo $data_formatada; ?></p>
    </header>

    <div class="container">
        <div class="nav-links">
            <a href="../index.php" class="btn">Início</a>
            <a href="cursos.php" class="btn">Cursos</a>
            <a href="professores.php" class="btn">Professores</a>
            <a href="reservas.php" class="btn">Reservas</a>
            <a href="painel_coordenador.php" class="btn">Coordenador</a>
            <a href="painel_tv.php" class="btn" target="_blank">Painel TV</a>
        </div>

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
                                <?php echo $sala['aulas_hoje'] > 0 ? $sala['aulas_hoje'] . ' aulas' : 'Livre'; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <p>Nenhuma sala cadastrada</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
