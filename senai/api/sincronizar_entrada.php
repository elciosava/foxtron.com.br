<?php
header('Content-Type: application/json; charset=utf-8');
require '../conexao/conexao.php';
require '../conexao/aprendizagem.php';

try {
    garantirEstruturaAprendizagem($conexao);
    $input = json_decode(file_get_contents('php://input'), true);
    if (!is_array($input)) throw new InvalidArgumentException('Payload JSON inválido.');

    $cursoBaseId = (int)($input['curso_base_id'] ?? 0);
    $dataInicio = (string)($input['data_inicio'] ?? '');
    $horasDia = (float)($input['horas_por_dia'] ?? 4);
    if ($cursoBaseId <= 0 || $dataInicio === '' || $horasDia <= 0) {
        throw new InvalidArgumentException('Turma-base, data de início e horas por dia são obrigatórios.');
    }

    $stmt = $conexao->prepare("SELECT * FROM cursos WHERE id = :id");
    $stmt->execute([':id' => $cursoBaseId]);
    $base = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$base || !cursoEhAprendizagem($base)) throw new RuntimeException('Turma-base de Aprendizagem não encontrada.');

    $ucs = buscarUcsEntradaObrigatorias($conexao, $cursoBaseId);
    $faltantes = array_keys(array_filter($ucs, fn($uc) => !$uc));
    if ($faltantes) throw new RuntimeException('Faltam UCs obrigatórias na turma-base: ' . implode(', ', $faltantes) . '.');

    $cargaTotal = array_sum(array_map(fn($uc) => (float)$uc['carga_horaria'], $ucs));
    $bloqueadas = $conexao->query("SELECT data FROM feriados")->fetchAll(PDO::FETCH_COLUMN);
    $fimModulo = calcularFimModuloEntrada($dataInicio, $cargaTotal, $horasDia, $bloqueadas);
    $destino = localizarProximaUcTurmaBase($conexao, $cursoBaseId, $fimModulo);

    echo json_encode([
        'status' => 'ok',
        'carga_horaria_entrada' => $cargaTotal,
        'data_fim_teorica' => $fimModulo,
        'data_integracao' => $destino['data_inicio_uc'] ?? null,
        'data_fim_sincronizada' => $destino['data_inicio_uc'] ?? $fimModulo,
        'uc_id_destino' => isset($destino['uc_id']) ? (int)$destino['uc_id'] : null,
        'uc_nome' => $destino['uc_nome'] ?? null,
        'uc_sigla' => $destino['uc_sigla'] ?? null,
        'mensagem' => $destino ? 'Integração localizada.' : 'Não há próxima UC da turma-base após o módulo de entrada.'
    ], JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
    http_response_code(400);
    echo json_encode(['status' => 'erro', 'mensagem' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
}
