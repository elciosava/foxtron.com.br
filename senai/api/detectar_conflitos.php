<?php
include '../conexao/conexao.php';
header('Content-Type: application/json; charset=utf-8');

try {
    $colunasAulas = $conexao->query("SHOW COLUMNS FROM aulas")->fetchAll(PDO::FETCH_COLUMN);
    $temSalaId = in_array('sala_id', $colunasAulas, true);

    $sql = "SELECT a.*, p.id AS professor_id";
    if ($temSalaId) {
        $sql .= ", a.sala_id AS sala_id";
    } else {
        $sql .= ", NULL AS sala_id";
    }
    $sql .= " FROM aulas a\n              LEFT JOIN professores p ON a.professor_id = p.id\n              WHERE a.data >= CURDATE()\n                AND a.modalidade NOT IN ('AVA','IND')\n              ORDER BY a.data, a.hora_inicio";

    $aulas = $conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $conflitosDetectados = [];

    foreach ($aulas as $i => $aula1) {
        for ($j = $i + 1, $n = count($aulas); $j < $n; $j++) {
            $aula2 = $aulas[$j];
            if ($aula1['data'] !== $aula2['data']) continue;

            $sobrepoe = !(
                strtotime($aula1['hora_fim']) <= strtotime($aula2['hora_inicio']) ||
                strtotime($aula2['hora_fim']) <= strtotime($aula1['hora_inicio'])
            );
            if (!$sobrepoe) continue;

            if (!empty($aula1['professor_id']) && !empty($aula2['professor_id']) &&
                (int)$aula1['professor_id'] === (int)$aula2['professor_id']) {
                $conflitosDetectados[] = [
                    'tipo' => 'PROFESSOR_OCUPADO',
                    'professor_id' => (int)$aula1['professor_id'],
                    'sala_id' => null,
                    'aula_id' => (int)$aula1['id'],
                    'descricao' => 'Professor com duas aulas simultâneas',
                    'data_conflito' => $aula1['data'] . ' ' . $aula1['hora_inicio'],
                ];
            }

            if ($temSalaId && !empty($aula1['sala_id']) && !empty($aula2['sala_id']) &&
                (int)$aula1['sala_id'] === (int)$aula2['sala_id']) {
                $conflitosDetectados[] = [
                    'tipo' => 'SALA_OCUPADA',
                    'professor_id' => $aula1['professor_id'] ? (int)$aula1['professor_id'] : null,
                    'sala_id' => (int)$aula1['sala_id'],
                    'aula_id' => (int)$aula1['id'],
                    'descricao' => 'Sala ocupada por outra aula',
                    'data_conflito' => $aula1['data'] . ' ' . $aula1['hora_inicio'],
                ];
            }
        }
    }

    // Persiste apenas se a tabela de conflitos existir.
    $temTabelaConflitos = (bool)$conexao->query("SHOW TABLES LIKE 'conflitos'")->fetchColumn();
    if ($temTabelaConflitos) {
        foreach ($conflitosDetectados as $conflito) {
            $stmtCheck = $conexao->prepare("SELECT id FROM conflitos WHERE aula_id = :aula_id AND tipo_conflito = :tipo AND status = 'DETECTADO' LIMIT 1");
            $stmtCheck->execute([':aula_id' => $conflito['aula_id'], ':tipo' => $conflito['tipo']]);
            if (!$stmtCheck->fetchColumn()) {
                $stmtInsert = $conexao->prepare("INSERT INTO conflitos
                    (professor_id, sala_id, aula_id, tipo_conflito, descricao, data_conflito, status)
                    VALUES (:professor_id, :sala_id, :aula_id, :tipo, :descricao, :data_conflito, 'DETECTADO')");
                $stmtInsert->execute([
                    ':professor_id' => $conflito['professor_id'], ':sala_id' => $conflito['sala_id'],
                    ':aula_id' => $conflito['aula_id'], ':tipo' => $conflito['tipo'],
                    ':descricao' => $conflito['descricao'], ':data_conflito' => $conflito['data_conflito'],
                ]);
            }
        }
    }

    echo json_encode(['sucesso' => true, 'conflitos_detectados' => count($conflitosDetectados), 'detalhes' => $conflitosDetectados], JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['sucesso' => false, 'erro' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
}
