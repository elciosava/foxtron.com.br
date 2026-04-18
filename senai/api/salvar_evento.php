<?php
require '../conexao/conexao.php';
require '../conexao/utilidades.php';

header('Content-Type: application/json; charset=utf-8');

$dados = json_decode(file_get_contents("php://input"), true);

if (!$dados) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Payload inválido']);
    exit;
}

$id   = !empty($dados['id']) ? (int)$dados['id'] : null;
$prof = $dados['professor_id'] ?? null;
$data = $dados['data'] ?? null;
$turno = $dados['turno'] ?? null;
$curso = $dados['curso_id'] ?: null;
$uc    = $dados['uc_id'] ?: null;
$tipo  = $dados['tipo'] ?? 'AULA';
$sub   = !empty($dados['substituto_id']) ? $dados['substituto_id'] : null;
$obs   = $dados['observacao'] ?? null;

if (!$prof || !$data || !$turno) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Professor, data e turno são obrigatórios.']);
    exit;
}

try {
    
    // --- VALIDAÇÃO DE CONFLITO ---
    // Definir horários aproximados com base no turno para a validação
    $h_ini = '08:00:00'; $h_fim = '12:00:00';
    if ($turno === 'Tarde') { $h_ini = '13:30:00'; $h_fim = '17:30:00'; }
    elseif ($turno === 'Noite') { $h_ini = '18:30:00'; $h_fim = '22:30:00'; }

    // Só validar se não for FOLGA (que libera o professor)
    if ($tipo !== 'FOLGA') {
        $disp = verificarDisponibilidadeProfessor($prof, $data, $h_ini, $h_fim, $conexao, null, $id);
        if (!$disp['disponivel']) {
            echo json_encode(['status' => 'erro', 'mensagem' => $disp['conflito']]);
            exit;
        }
    }
    // -----------------------------

    if ($id) {
        // 🔁 EDITAR
        $sql = "UPDATE agenda_professores
                SET professor_id = :prof,
                    data         = :data,
                    turno        = :turno,
                    curso_id     = :curso,
                    uc_id        = :uc,
                    tipo         = :tipo,
                    substituto_id= :sub,
                    observacao   = :obs
                WHERE id = :id";

        $stmt = $conexao->prepare($sql);
        $stmt->execute([
            ':prof' => $prof,
            ':data' => $data,
            ':turno'=> $turno,
            ':curso'=> $curso,
            ':uc'   => $uc,
            ':tipo' => $tipo,
            ':sub'  => $sub,
            ':obs'  => $obs,
            ':id'   => $id
        ]);

    } else {
        // ➕ NOVO
        $sql = "INSERT INTO agenda_professores
                (professor_id, data, turno, curso_id, uc_id, tipo, substituto_id, observacao)
                VALUES
                (:prof, :data, :turno, :curso, :uc, :tipo, :sub, :obs)";

        $stmt = $conexao->prepare($sql);
        $stmt->execute([
            ':prof' => $prof,
            ':data' => $data,
            ':turno'=> $turno,
            ':curso'=> $curso,
            ':uc'   => $uc,
            ':tipo' => $tipo,
            ':sub'  => $sub,
            ':obs'  => $obs
        ]);
    }

    echo json_encode(['status' => 'ok']);

} catch (PDOException $e) {
    echo json_encode(['status' => 'erro', 'mensagem' => $e->getMessage()]);
}
