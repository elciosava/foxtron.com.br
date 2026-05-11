<?php
// API para Gerar Alertas Inteligentes
include '../conexao/conexao.php';

header('Content-Type: application/json');

try {
    $alertas_gerados = [];
    
    // 1. Alertas de aula começando em 10 minutos
    $hora_agora = date('H:i:s');
    $hora_futura = date('H:i:s', strtotime('+10 minutes'));
    
    $sql = "SELECT a.*, p.id as professor_id, p.nome as professor_nome, s.nome as sala_nome
            FROM aulas a
            LEFT JOIN professores p ON a.professor_id = p.id
            LEFT JOIN salas s ON a.sala_id = s.id
            WHERE a.data = CURDATE() 
            AND a.hora_inicio BETWEEN :hora_agora AND :hora_futura";
    
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        ':hora_agora' => $hora_agora,
        ':hora_futura' => $hora_futura
    ]);
    $aulas_proximas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($aulas_proximas as $aula) {
        // Verificar se já existe alerta
        $sql_check = "SELECT id FROM alertas WHERE aula_id = :aula_id AND tipo_alerta = 'AULA_EM_10MIN' AND lido = 0";
        $stmt_check = $conexao->prepare($sql_check);
        $stmt_check->execute([':aula_id' => $aula['id']]);
        
        if ($stmt_check->rowCount() === 0) {
            $mensagem = "Aula de " . $aula['curso_nome'] . " começando em 10 minutos na " . $aula['sala_nome'];
            
            $sql_insert = "INSERT INTO alertas (professor_id, aula_id, tipo_alerta, mensagem, lido)
                          VALUES (:professor_id, :aula_id, 'AULA_EM_10MIN', :mensagem, 0)";
            
            $stmt_insert = $conexao->prepare($sql_insert);
            $stmt_insert->execute([
                ':professor_id' => $aula['professor_id'],
                ':aula_id' => $aula['id'],
                ':mensagem' => $mensagem
            ]);
            
            $alertas_gerados[] = [
                'tipo' => 'AULA_EM_10MIN',
                'professor' => $aula['professor_nome'],
                'mensagem' => $mensagem
            ];
        }
    }
    
    // 2. Alertas de conflitos
    $sql = "SELECT c.*, p.nome as professor_nome, s.nome as sala_nome, s2.nome as sala_sugerida
            FROM conflitos c
            LEFT JOIN professores p ON c.professor_id = p.id
            LEFT JOIN salas s ON c.sala_id = s.id
            LEFT JOIN salas s2 ON c.sala_sugerida_id = s2.id
            WHERE c.status = 'DETECTADO'
            AND DATE(c.criado_em) = CURDATE()";
    
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $conflitos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($conflitos as $conflito) {
        // Verificar se já existe alerta
        $sql_check = "SELECT id FROM alertas WHERE aula_id = :aula_id AND tipo_alerta = 'CONFLITO' AND lido = 0";
        $stmt_check = $conexao->prepare($sql_check);
        $stmt_check->execute([':aula_id' => $conflito['aula_id']]);
        
        if ($stmt_check->rowCount() === 0) {
            $mensagem = "⚠️ Conflito detectado: " . $conflito['descricao'];
            
            $sql_insert = "INSERT INTO alertas (professor_id, aula_id, tipo_alerta, mensagem, lido)
                          VALUES (:professor_id, :aula_id, 'CONFLITO', :mensagem, 0)";
            
            $stmt_insert = $conexao->prepare($sql_insert);
            $stmt_insert->execute([
                ':professor_id' => $conflito['professor_id'],
                ':aula_id' => $conflito['aula_id'],
                ':mensagem' => $mensagem
            ]);
            
            $alertas_gerados[] = [
                'tipo' => 'CONFLITO',
                'professor' => $conflito['professor_nome'],
                'mensagem' => $mensagem
            ];
        }
    }
    
    echo json_encode([
        'sucesso' => true,
        'alertas_gerados' => count($alertas_gerados),
        'detalhes' => $alertas_gerados
    ]);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'sucesso' => false,
        'erro' => $e->getMessage()
    ]);
}
?>
