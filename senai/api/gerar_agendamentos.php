<?php
// ../api/gerar_agendamentos.php
require '../conexao/conexao.php';

$curso_id = filter_input(INPUT_GET, 'curso_id', FILTER_VALIDATE_INT);

if (!$curso_id) {
    die("Curso inválido.");
}

try {
    // Buscar curso
    $sql = "SELECT * FROM cursos WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':id' => $curso_id]);
    $curso = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$curso) {
        die("Curso não encontrado.");
    }

    // Buscar feriados
    $sqlF = "SELECT data FROM feriados";
    $stmtF = $conexao->query($sqlF);
    $feriados = $stmtF->fetchAll(PDO::FETCH_COLUMN); // ['YYYY-MM-DD', ...]

    $cargaTotal   = (float)($curso['carga_horaria_total'] ?? 0);
    $horasDia     = (float)($curso['horas_por_dia'] ?? 0);
    $dataInicioStr= $curso['data_inicio'] ?? '';
    $diasAulaStr  = strtoupper($curso['dias_aula'] ?? '');
    $turno        = $curso['turno'] ?? 'Vespertino';

    if ($cargaTotal <= 0 || $horasDia <= 0 || empty($dataInicioStr) || empty($diasAulaStr)) {
        die("Dados insuficientes para gerar agendamentos (verifique CH, horas/dia, data início, dias de aula).");
    }

    // Define horário padrão conforme turno
    switch ($turno) {
        case 'Matutino':
            $horaInicioStr = '08:00:00';
            break;
        case 'Vespertino':
            $horaInicioStr = '13:30:00';
            break;
        case 'Noturno':
        default:
            $horaInicioStr = '18:30:00';
            break;
    }

    $horaInicio = new DateTime($horaInicioStr);
    $horaFim = clone $horaInicio;
    $horaFim->modify('+' . $horasDia . ' hour');
    $horaFimStr = $horaFim->format('H:i:s');

    // Mapa dias da semana
    $mapaDiaSemana = [
        0 => 'DOM',
        1 => 'SEG',
        2 => 'TER',
        3 => 'QUA',
        4 => 'QUI',
        5 => 'SEX',
        6 => 'SAB'
    ];

    // Dias permitidos (SEG,TER,...)
    $diasPermitidos = array_filter(array_map('trim', explode(',', $diasAulaStr)));
    if (empty($diasPermitidos)) {
        die("Dias de aula inválidos.");
    }

    // Gera lista de "slots" de aula (data + horário)
    $data = new DateTime($dataInicioStr);
    $horasAcumuladas = 0;
    $slots = [];
    $seguranca = 0;

    while ($horasAcumuladas < $cargaTotal && $seguranca < 3000) {
        $seguranca++;

        $diaSemana = $mapaDiaSemana[(int)$data->format('w')];
        $dataYmd   = $data->format('Y-m-d');
        $ehFeriado = in_array($dataYmd, $feriados);

        if (in_array($diaSemana, $diasPermitidos, true) && !$ehFeriado) {
            $slots[] = [
                'data'        => $dataYmd,
                'hora_inicio' => $horaInicioStr,
                'hora_fim'    => $horaFimStr,
            ];
            $horasAcumuladas += $horasDia;
        }

        $data->modify('+1 day');
    }

    if (empty($slots)) {
        die("Nenhum dia letivo foi gerado. Verifique a configuração do curso.");
    }

    $conexao->beginTransaction();

    // Limpa agendamentos e aulas anteriores desse curso
    $stmt = $conexao->prepare("DELETE FROM agendamentos WHERE curso_id = :curso_id");
    $stmt->execute([':curso_id' => $curso_id]);

    $stmt = $conexao->prepare("DELETE FROM aulas WHERE curso_id = :curso_id");
    $stmt->execute([':curso_id' => $curso_id]);

    // Insere na tabela agendamentos
    $sqlInsAg = "INSERT INTO agendamentos (curso_id, data_aula, hora_inicio, hora_fim)
                 VALUES (:curso_id, :data_aula, :hora_inicio, :hora_fim)";
    $stmtAg = $conexao->prepare($sqlInsAg);

    foreach ($slots as $slot) {
        $stmtAg->execute([
            ':curso_id'   => $curso_id,
            ':data_aula'  => $slot['data'],
            ':hora_inicio'=> $slot['hora_inicio'],
            ':hora_fim'   => $slot['hora_fim'],
        ]);
    }

    // Agora vamos preencher AULAS com base nesses slots + UCs

    // Buscar UCs do curso (ajuste o nome da coluna de CH se for diferente)
    $sqlUC = "SELECT id, sigla, nome, carga_horaria, professor_id 
              FROM unidades_curriculares 
              WHERE curso_id = :curso_id
              ORDER BY id";
    $stmtUC = $conexao->prepare($sqlUC);
    $stmtUC->execute([':curso_id' => $curso_id]);
    $ucs = $stmtUC->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($ucs)) {
        $sqlInsAula = "INSERT INTO aulas (curso_id, data, hora_inicio, hora_fim, uc_id, professor_id)
                       VALUES (:curso_id, :data, :hora_inicio, :hora_fim, :uc_id, :professor_id)";
        $stmtAula = $conexao->prepare($sqlInsAula);

        $slotIndex = 0;
        $totalSlots = count($slots);

        foreach ($ucs as $uc) {
            $chUC = (float)($uc['carga_horaria'] ?? 0);

            if ($chUC <= 0) {
                continue; // pula UC sem CH
            }

            // Quantos dias essa UC ocupa
            $diasUC = (int)ceil($chUC / $horasDia);

            for ($i = 0; $i < $diasUC; $i++) {
                if ($slotIndex >= $totalSlots) {
                    break 2; // acabou slot de aula, sai de tudo
                }

                $slot = $slots[$slotIndex];

                $stmtAula->execute([
                    ':curso_id'    => $curso_id,
                    ':data'        => $slot['data'],
                    ':hora_inicio' => $slot['hora_inicio'],
                    ':hora_fim'    => $slot['hora_fim'],
                    ':uc_id'       => $uc['id'],
                    ':professor_id'=> $uc['professor_id'] ?? null
                ]);

                $slotIndex++;
            }
        }
    }

    $conexao->commit();

    // Depois de gerar tudo, volta pro calendário bonitinho
    header("Location: ../paginas/calendario_curso.php?curso_id=" . $curso_id);
    exit;

} catch (PDOException $e) {
    if ($conexao->inTransaction()) {
        $conexao->rollBack();
    }
    die("Erro ao gerar agendamentos/aulas: " . $e->getMessage());
}
