<?php
// senai/api/sincronizar_entrada.php
header('Content-Type: application/json; charset=utf-8');

require '../conexao/conexao.php';

try {
    // Lê JSON vindo do fetch do front-end
    $input = json_decode(file_get_contents('php://input'), true);

    if (!is_array($input)) {
        echo json_encode([
            'status'   => 'erro',
            'mensagem' => 'Payload inválido (JSON não encontrado).'
        ]);
        exit;
    }

    $curso_base_id       = (int)($input['curso_base_id'] ?? 0);
    $carga_total         = (float)($input['carga_horaria_total'] ?? 0);
    $horas_por_dia       = (float)($input['horas_por_dia'] ?? 0);
    $dias_aula_str       = strtoupper(trim($input['dias_aula'] ?? ''));
    $data_inicio_str     = $input['data_inicio'] ?? '';

    // Validações básicas
    if ($curso_base_id <= 0) {
        echo json_encode([
            'status'   => 'erro',
            'mensagem' => 'curso_base_id inválido.'
        ]);
        exit;
    }
    if ($carga_total <= 0 || $horas_por_dia <= 0) {
        echo json_encode([
            'status'   => 'erro',
            'mensagem' => 'Carga horária total ou horas por dia inválidas.'
        ]);
        exit;
    }
    if (empty($data_inicio_str) || empty($dias_aula_str)) {
        echo json_encode([
            'status'   => 'erro',
            'mensagem' => 'Data de início e dias de aula são obrigatórios.'
        ]);
        exit;
    }

    // Verifica se o curso base existe
    $sqlCursoBase = "SELECT * FROM cursos WHERE id = :id";
    $stmtBase = $conexao->prepare($sqlCursoBase);
    $stmtBase->execute([':id' => $curso_base_id]);
    $cursoBase = $stmtBase->fetch(PDO::FETCH_ASSOC);

    if (!$cursoBase) {
        echo json_encode([
            'status'   => 'erro',
            'mensagem' => 'Curso base não encontrado.'
        ]);
        exit;
    }

    // Busca feriados/férias (qualquer tipo) para NÃO contar aula nesses dias
    $sqlF = "SELECT data FROM feriados";
    $stmtF = $conexao->query($sqlF);
    $feriados = $stmtF->fetchAll(PDO::FETCH_COLUMN); // ['YYYY-MM-DD', ...]

    // -----------------------------
    // 1) CALCULAR DATA FIM TEÓRICA
    // -----------------------------
    $diasPermitidos = array_filter(array_map('trim', explode(',', $dias_aula_str)));
    if (empty($diasPermitidos)) {
        echo json_encode([
            'status'   => 'erro',
            'mensagem' => 'Dias de aula inválidos.'
        ]);
        exit;
    }

    // Mapa dia da semana numérico -> rótulo
    $mapaDiaSemana = [
        0 => 'DOM',
        1 => 'SEG',
        2 => 'TER',
        3 => 'QUA',
        4 => 'QUI',
        5 => 'SEX',
        6 => 'SAB'
    ];

    $dataAtual = DateTime::createFromFormat('Y-m-d', $data_inicio_str);
    if (!$dataAtual) {
        echo json_encode([
            'status'   => 'erro',
            'mensagem' => 'Data de início em formato inválido (use YYYY-MM-DD).'
        ]);
        exit;
    }

    $horasAcumuladas = 0.0;
    $seguranca       = 0;

    while ($horasAcumuladas < $carga_total && $seguranca < 4000) {
        $seguranca++;

        $diaSemanaNum = (int)$dataAtual->format('w'); // 0..6
        $rotuloDia    = $mapaDiaSemana[$diaSemanaNum] ?? '';
        $dataYmd      = $dataAtual->format('Y-m-d');

        $ehFeriado = in_array($dataYmd, $feriados, true);

        // Conta carga apenas se for dia permitido E não for feriado/férias
        if (in_array($rotuloDia, $diasPermitidos, true) && !$ehFeriado) {
            $horasAcumuladas += $horas_por_dia;
        }

        if ($horasAcumuladas >= $carga_total) {
            break;
        }

        // Vai para o próximo dia
        $dataAtual->modify('+1 day');
    }

    if ($seguranca >= 4000) {
        echo json_encode([
            'status'   => 'erro',
            'mensagem' => 'Loop de cálculo de data fim excedeu o limite de segurança.'
        ]);
        exit;
    }

    $data_fim_teorica = $dataAtual->format('Y-m-d');

    // -----------------------------
    // 2) SOMAR 1 SEMANA DE FOLGA
    // -----------------------------
    $dataFimComFolga = clone $dataAtual;
    $dataFimComFolga->modify('+7 day');
    $data_fim_com_folga = $dataFimComFolga->format('Y-m-d');

    // -------------------------------------------
    // 3) PROCURAR PRÓXIMA UC DO CURSO BASE
    //    QUE COMECE APÓS ESSA FOLGA
    // -------------------------------------------

    // Primeiro, verifica se o curso base já tem calendário de aulas
    $sqlCheckAulas = "SELECT COUNT(*) FROM aulas WHERE curso_id = :curso_id";
    $stmtCheck = $conexao->prepare($sqlCheckAulas);
    $stmtCheck->execute([':curso_id' => $curso_base_id]);
    $totalAulasBase = (int)$stmtCheck->fetchColumn();

    if ($totalAulasBase === 0) {
        // Não tem calendário gerado ainda — devolve só a data teórica,
        // e deixa o front avisar o usuário
        echo json_encode([
            'status'             => 'ok',
            'data_fim_teorica'   => $data_fim_teorica,
            'data_fim_sincronizada' => $data_fim_teorica,
            'mensagem'           => 'Curso base ainda não possui calendário (aulas) gerado.'
        ]);
        exit;
    }

    // Agrupa as aulas do curso base por UC e pega a menor data de cada UC
    $sqlUCs = "
        SELECT 
            a.uc_id,
            MIN(a.data) AS data_inicio_uc,
            u.nome       AS uc_nome,
            u.sigla      AS uc_sigla
        FROM aulas a
        JOIN unidades_curriculares u ON u.id = a.uc_id
        WHERE a.curso_id = :curso_id
        GROUP BY a.uc_id, u.nome, u.sigla
        ORDER BY data_inicio_uc ASC
    ";

    $stmtUCs = $conexao->prepare($sqlUCs);
    $stmtUCs->execute([':curso_id' => $curso_base_id]);
    $ucsCalendario = $stmtUCs->fetchAll(PDO::FETCH_ASSOC);

    $ucDestino = null;

    foreach ($ucsCalendario as $linha) {
        $dataInicioUC = $linha['data_inicio_uc']; // 'YYYY-MM-DD'
        if ($dataInicioUC >= $data_fim_com_folga) {
            $ucDestino = $linha;
            break;
        }
    }

    // Se encontrou uma UC para grudar, sincronia pela data de início dela
    if ($ucDestino) {
        $data_fim_sincronizada = $ucDestino['data_inicio_uc'];
        $uc_id_destino         = (int)$ucDestino['uc_id'];
        $uc_nome_destino       = $ucDestino['uc_nome'];
        $uc_sigla_destino      = $ucDestino['uc_sigla'];
    } else {
        // Nenhuma UC começa depois da folga.
        // Nesse caso, a entrada termina apenas na data teórica
        // (você pode ajustar essa regra se quiser endurecer).
        $data_fim_sincronizada = $data_fim_teorica;
        $uc_id_destino         = null;
        $uc_nome_destino       = null;
        $uc_sigla_destino      = null;
    }

    echo json_encode([
        'status'               => 'ok',
        'data_fim_teorica'     => $data_fim_teorica,
        'data_fim_sincronizada'=> $data_fim_sincronizada,
        'data_fim_com_folga'   => $data_fim_com_folga, // só se quiser usar no front
        'uc_id_destino'        => $uc_id_destino,
        'uc_nome'              => $uc_nome_destino,
        'uc_sigla'             => $uc_sigla_destino
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'status'   => 'erro',
        'mensagem' => 'Erro de banco de dados: ' . $e->getMessage()
    ]);
} catch (Exception $e) {
    echo json_encode([
        'status'   => 'erro',
        'mensagem' => 'Erro geral: ' . $e->getMessage()
    ]);
}
