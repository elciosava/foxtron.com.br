<?php
// API para Detecção de Conflitos
include '../conexao/conexao.php';

header('Content-Type: application/json');

try {
    // Buscar todas as aulas
    $sql = "SELECT a.*, p.id as professor_id, s.id as sala_id
            FROM aulas a
            LEFT JOIN professores p ON a.professor_id = p.id
            LEFT JOIN salas s ON a.sala_id = s.id
            WHERE a.data >= CURDATE()";
    
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $aulas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $conflitos_detectados = [];
    
    // Verificar conflitos
    foreach ($aulas as $i => $aula1) {
        foreach ($aulas as $j => $aula2) {
            if ($i >= $j) continue;
            
            // Mesmo professor, mesma data, horários sobrepostos
            if ($aula1['professor_id'] === $aula2['professor_id'] && 
                $aula1['data'] === $aula2['data'] &&
                !(strtotime($aula1['hora_fim']) <= strtotime($aula2['hora_inicio'] || 
                  strtotime($aula2['hora_fim']) <= strtotime($aula1['hora_inicio'])))) {
                
                $conflitos_detectados[] = [
                    'tipo' => 'PROFESSOR_OCUPADO',
                    'professor_id' => $aula1['professor_id'],
                    'aula_id' => $aula1['id'],
                    'descricao' => 'Professor com duas aulas simultâneas',
                    'data_conflito' => $aula1['data'] . ' ' . $aula1['hora_inicio']
                ];
            }
            
            // Mesma sala, mesma data, horários sobrepostos
            if ($aula1['sala_id'] === $aula2['sala_id'] && 
                $aula1['data'] === $aula2['data'] &&
                !(strtotime($aula1['hora_fim']) <= strtotime($aula2['hora_inicio']) || 
                  strtotime($aula2['hora_fim']) <= strtotime($aula1['hora_inicio']))) {
                
                $conflitos_detectados[] = [
                    'tipo' => 'SALA_OCUPADA',
                    'professor_id' => $aula1['professor_id'],
                    'sala_id' => $aula1['sala_id'],
                    'aula_id' => $aula1['id'],
                    'descricao' => 'Sala ocupada por outro professor',
                    'data_conflito' => $aula1['data'] . ' ' . $aula1['hora_inicio']
                ];
            }
        }
    }
    
    // Inserir conflitos no banco
    foreach ($conflitos_detectados as $conflito) {
        try {
            $sql_check = "SELECT id FROM conflitos WHERE aula_id = :aula_id AND tipo_conflito = :tipo AND status = 'DETECTADO'";
            $stmt_check = $conexao->prepare($sql_check);
            $stmt_check->execute([
                ':aula_id' => $conflito['aula_id'],
                ':tipo' => $conflito['tipo']
            ]);
            
            if ($stmt_check->rowCount() === 0) {
                $sql_insert = "INSERT INTO conflitos (professor_id, sala_id, aula_id, tipo_conflito, descricao, data_conflito, status)
                              VALUES (:professor_id, :sala_id, :aula_id, :tipo_conflito, :descricao, :data_conflito, 'DETECTADO')";
                
                $stmt_insert = $conexao->prepare($sql_insert);
                $stmt_insert->execute([
                    ':professor_id' => $conflito['professor_id'],
                    ':sala_id' => $conflito['sala_id'] ?? null,
                    ':aula_id' => $conflito['aula_id'],
                    ':tipo_conflito' => $conflito['tipo'],
                    ':descricao' => $conflito['descricao'],
                    ':data_conflito' => $conflito['data_conflito']
                ]);
            }
        } catch (PDOException $e) {
            // Continuar mesmo se houver erro
        }
    }
    
    echo json_encode([
        'sucesso' => true,
        'conflitos_detectados' => count($conflitos_detectados),
        'detalhes' => $conflitos_detectados
    ]);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'sucesso' => false,
        'erro' => $e->getMessage()
    ]);
}
?>
