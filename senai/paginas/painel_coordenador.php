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
            max-width: 1400px;
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

        .grid-4 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
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

        .grid-3 {
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
            max-height: 500px;
            overflow-y: auto;
        }

        .item {
            padding: 15px;
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
        }

        .item-details {
            color: #666;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .item-badge {
            background: #667eea;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: bold;
        }

        .item-badge.warning {
            background: #f59e0b;
        }

        .item-badge.danger {
            background: #ef4444;
        }

        .item-badge.success {
            background: #10b981;
        }

        .btn-group {
            display: flex;
            gap: 5px;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.85em;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-approve {
            background: #10b981;
            color: white;
        }

        .btn-approve:hover {
            background: #059669;
        }

        .btn-reject {
            background: #ef4444;
            color: white;
        }

        .btn-reject:hover {
            background: #dc2626;
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
            .grid-4 {
                grid-template-columns: repeat(2, 1fr);
            }

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
            <h1>👔 Painel do Coordenador</h1>
            <p>Gerenciamento completo de agenda, salas e professores</p>
        </header>

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
                            <div class="empty-state-icon">📭</div>
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
                            <div class="empty-state-icon">✅</div>
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
                            <div class="empty-state-icon">📭</div>
                            <p>Nenhum professor com aulas</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Substituições Pendentes -->
        <div style="margin-top: 30px;">
            <div class="panel">
                <div class="panel-header">⚡ Substituições Pendentes de Aprovação</div>
                <div class="panel-body">
                    <?php if (count($substituicoes_pendentes) > 0): ?>
                        <?php foreach ($substituicoes_pendentes as $subst): ?>
                        <div class="item">
                            <div class="item-info">
                                <div class="item-name">
                                    <?php echo htmlspecialchars($subst['professor_original']); ?> 
                                    → 
                                    <?php echo htmlspecialchars($subst['professor_substituto']); ?>
                                </div>
                                <div class="item-details">
                                    Curso: <?php echo htmlspecialchars($subst['curso_nome'] ?? 'N/A'); ?><br>
                                    Data: <?php echo date('d/m/Y', strtotime($subst['data_substituicao'])); ?><br>
                                    Motivo: <?php echo htmlspecialchars($subst['motivo'] ?? 'Não especificado'); ?>
                                </div>
                            </div>
                            <div class="btn-group">
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="acao" value="processar_substituicao">
                                    <input type="hidden" name="substituicao_id" value="<?php echo $subst['id']; ?>">
                                    <input type="hidden" name="status" value="APROVADA">
                                    <button type="submit" class="btn btn-approve">Aprovar</button>
                                </form>
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="acao" value="processar_substituicao">
                                    <input type="hidden" name="substituicao_id" value="<?php echo $subst['id']; ?>">
                                    <input type="hidden" name="status" value="REJEITADA">
                                    <button type="submit" class="btn btn-reject">Rejeitar</button>
                                </form>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <div class="empty-state-icon">✅</div>
                            <p>Nenhuma substituição pendente</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
