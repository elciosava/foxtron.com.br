<?php
// Painel do Coordenador
include '../conexao/conexao.php';

// Buscar estatísticas gerais
try {
    // Total de aulas
    $sql = "SELECT COUNT(*) as total FROM aulas WHERE data >= CURDATE()";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $total_aulas = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

    // Total de professores
    $sql = "SELECT COUNT(*) as total FROM professores";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $total_professores = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

    // Total de salas
    $sql = "SELECT COUNT(*) as total FROM salas WHERE status = 'ATIVA'";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $total_salas = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

    // Conflitos detectados
    $sql = "SELECT COUNT(*) as total FROM conflitos WHERE status = 'DETECTADO'";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $total_conflitos = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

} catch (PDOException $e) {
    $total_aulas = $total_professores = $total_salas = $total_conflitos = 0;
}

// Ocupação de salas
try {
    $sql = "SELECT s.id, s.nome, s.tipo, s.capacidade, COUNT(a.id) as aulas_hoje
            FROM salas s
            LEFT JOIN aulas a ON s.id = a.sala_id AND a.data = CURDATE()
            WHERE s.status = 'ATIVA'
            GROUP BY s.id
            ORDER BY s.nome ASC";
    
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $ocupacao_salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $ocupacao_salas = [];
}

// Carga horária dos professores
try {
    $sql = "SELECT p.id, p.nome, COUNT(a.id) as total_aulas, SUM(TIMESTAMPDIFF(MINUTE, a.hora_inicio, a.hora_fim)) as total_minutos
            FROM professores p
            LEFT JOIN aulas a ON p.id = a.professor_id AND a.data >= CURDATE()
            GROUP BY p.id
            ORDER BY total_aulas DESC
            LIMIT 10";
    
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $carga_professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $carga_professores = [];
}

// Horários livres
try {
    $sql = "SELECT s.id, s.nome, COUNT(DISTINCT a.data) as dias_com_aula
            FROM salas s
            LEFT JOIN aulas a ON s.id = a.sala_id AND a.data >= CURDATE() AND a.data <= DATE_ADD(CURDATE(), INTERVAL 30 DAY)
            WHERE s.status = 'ATIVA'
            GROUP BY s.id
            HAVING COUNT(DISTINCT a.data) < 20
            ORDER BY COUNT(DISTINCT a.data) ASC
            LIMIT 5";
    
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $horarios_livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $horarios_livres = [];
}

// Substituições pendentes
try {
    $sql = "SELECT s.*, p1.nome as professor_original, p2.nome as professor_substituto, a.curso_id, c.nome as curso_nome
            FROM substituicoes s
            LEFT JOIN professores p1 ON s.professor_original_id = p1.id
            LEFT JOIN professores p2 ON s.professor_substituto_id = p2.id
            LEFT JOIN aulas a ON s.aula_id = a.id
            LEFT JOIN cursos c ON a.curso_id = c.id
            WHERE s.status = 'SOLICITADA'
            ORDER BY s.criado_em DESC
            LIMIT 10";
    
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $substituicoes_pendentes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $substituicoes_pendentes = [];
}

// Processar aprovação/rejeição de substituição
if ($_POST['acao'] ?? null === 'processar_substituicao') {
    try {
        $status = $_POST['status'];
        $substituicao_id = $_POST['substituicao_id'];
        
        $sql = "UPDATE substituicoes SET status = :status, atualizado_em = NOW() WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([':status' => $status, ':id' => $substituicao_id]);
        
        $mensagem = $status === 'APROVADA' ? '✅ Substituição aprovada!' : '❌ Substituição rejeitada!';
    } catch (PDOException $e) {
        $mensagem = 'Erro ao processar substituição';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Coordenador - SENAI Agenda</title>
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
            max-width: 1400px;
            margin: 20px auto;
            padding: 0 20px;
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

        .grid-4 {
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
            text-align: center;
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

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
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
            max-height: 500px;
            overflow-y: auto;
        }

        .item {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item:last-child {
            border-bottom: none;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-weight: bold;
            color: #333;
            font-size: 13px;
        }

        .item-details {
            color: #666;
            font-size: 11px;
            margin-top: 2px;
        }

        .item-badge {
            background: #1a2041;
            color: white;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
        }

        .item-badge.warning { background: #f59e0b; }
        .item-badge.danger { background: #ef4444; }
        .item-badge.success { background: #10b981; }

        .btn-group {
            display: flex;
            gap: 5px;
        }

        .btn-action {
            padding: 4px 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
            transition: opacity 0.2s;
        }

        .btn-approve { background: #10b981; color: white; }
        .btn-reject { background: #ef4444; color: white; }
        .btn-action:hover { opacity: 0.8; }

        .empty-state {
            text-align: center;
            padding: 20px;
            color: #999;
            font-size: 13px;
        }

        .msg {
            padding: 10px;
            background: #d4edda;
            color: #155724;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 13px;
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
        <h1>👔 Painel do Coordenador</h1>
        <p>Gerenciamento completo de agenda, salas e professores</p>
    </header>

    <div class="container">
        <div class="nav-links">
            <a href="dashboard.php" class="btn-nav">Dashboard</a>
            <a href="cursos.php" class="btn-nav">Cursos</a>
            <a href="professores.php" class="btn-nav">Professores</a>
        </div>

        <?php if (isset($mensagem)): ?>
            <div class="msg"><?php echo $mensagem; ?></div>
        <?php endif; ?>

        <!-- Métricas -->
        <div class="grid-4">
            <div class="card">
                <div class="card-title">Total de Aulas</div>
                <div class="card-value"><?php echo $total_aulas; ?></div>
            </div>

            <div class="card">
                <div class="card-title">Professores</div>
                <div class="card-value"><?php echo $total_professores; ?></div>
            </div>

            <div class="card">
                <div class="card-title">Salas Ativas</div>
                <div class="card-value"><?php echo $total_salas; ?></div>
            </div>

            <div class="card">
                <div class="card-title">Conflitos</div>
                <div class="card-value"><?php echo $total_conflitos; ?></div>
            </div>
        </div>

        <!-- Painéis Principais -->
        <div class="grid-3">
            <!-- Ocupação de Salas -->
            <div class="panel">
                <div class="panel-header">📊 Ocupação de Salas (Hoje)</div>
                <div class="panel-body">
                    <?php if (count($ocupacao_salas) > 0): ?>
                        <?php foreach ($ocupacao_salas as $sala): 
                            $taxa = ($sala['aulas_hoje'] / 5) * 100; // Assumindo máx 5 aulas por dia
                        ?>
                        <div class="item">
                            <div class="item-info">
                                <div class="item-name"><?php echo htmlspecialchars($sala['nome']); ?></div>
                                <div class="item-details">
                                    <?php echo $sala['aulas_hoje']; ?> aula(s) | 
                                    <?php echo $sala['capacidade']; ?> lugares
                                </div>
                            </div>
                            <div class="item-badge <?php echo $sala['aulas_hoje'] > 3 ? 'warning' : 'success'; ?>">
                                <?php echo round($taxa); ?>%
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <p>Nenhuma sala com aulas hoje</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Horários Livres -->
            <div class="panel">
                <div class="panel-header">📅 Horários Mais Livres</div>
                <div class="panel-body">
                    <?php if (count($horarios_livres) > 0): ?>
                        <?php foreach ($horarios_livres as $sala): ?>
                        <div class="item">
                            <div class="item-info">
                                <div class="item-name"><?php echo htmlspecialchars($sala['nome']); ?></div>
                                <div class="item-details">
                                    <?php echo $sala['dias_com_aula']; ?> dias com aula (próx. 30 dias)
                                </div>
                            </div>
                            <div class="item-badge success">
                                Disponível
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <p>Todas as salas bem utilizadas</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Carga Horária dos Professores -->
            <div class="panel">
                <div class="panel-header">👨‍🏫 Carga Horária dos Professores</div>
                <div class="panel-body">
                    <?php if (count($carga_professores) > 0): ?>
                        <?php foreach ($carga_professores as $prof): 
                            $horas = floor($prof['total_minutos'] / 60);
                            $minutos = $prof['total_minutos'] % 60;
                        ?>
                        <div class="item">
                            <div class="item-info">
                                <div class="item-name"><?php echo htmlspecialchars($prof['nome']); ?></div>
                                <div class="item-details">
                                    <?php echo $prof['total_aulas']; ?> aula(s) | 
                                    <?php echo $horas; ?>h<?php echo str_pad($minutos, 2, '0', STR_PAD_LEFT); ?>
                                </div>
                            </div>
                            <div class="item-badge">
                                <?php echo $prof['total_aulas']; ?> aulas
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <p>Sem dados de carga horária</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
