<?php
/**
 * Verifica se um professor está disponível em uma determinada data e intervalo de horários.
 * 
 * @param int $professor_id ID do professor
 * @param string $data Data no formato 'Y-m-d'
 * @param string $hora_inicio Horário de início 'H:i:s'
 * @param string $hora_fim Horário de fim 'H:i:s'
 * @param PDO $conexao Objeto de conexão PDO
 * @param int|null $aula_id_ignorar ID de uma aula para ignorar na busca (útil em edições)
 * @param int|null $evento_id_ignorar ID de um evento da agenda_professores para ignorar
 * @return array Retorna ['disponivel' => true] ou ['disponivel' => false, 'conflito' => 'descrição']
 */
function verificarDisponibilidadeProfessor($professor_id, $data, $hora_inicio, $hora_fim, $conexao, $aula_id_ignorar = null, $evento_id_ignorar = null) {
    
    // 1. Verificar conflitos na tabela de AULAS oficiais
    $sqlAulas = "SELECT a.id, c.nome as curso_nome, u.nome as uc_nome, a.hora_inicio, a.hora_fim 
                 FROM aulas a
                 JOIN cursos c ON a.curso_id = c.id
                 JOIN unidades_curriculares u ON a.uc_id = u.id
                 WHERE a.professor_id = :prof_id 
                   AND a.data = :data
                   AND a.hora_inicio < :hora_fim 
                   AND a.hora_fim > :hora_inicio
                   AND a.modalidade NOT IN ('AVA', 'IND')";
    
    if ($aula_id_ignorar) {
        $sqlAulas .= " AND a.id <> :aula_id";
    }
    
    $stmtAulas = $conexao->prepare($sqlAulas);
    $paramsAulas = [':prof_id' => $professor_id, ':data' => $data, ':hora_inicio' => $hora_inicio, ':hora_fim' => $hora_fim];
    if ($aula_id_ignorar) $paramsAulas[':aula_id'] = $aula_id_ignorar;
    
    $stmtAulas->execute($paramsAulas);
    $conflitoAula = $stmtAulas->fetch(PDO::FETCH_ASSOC);
    
    if ($conflitoAula) {
        return [
            'disponivel' => false,
            'conflito' => "O professor já tem uma aula oficial no curso '{$conflitoAula['curso_nome']}' (UC: {$conflitoAula['uc_nome']}) das " . substr($conflitoAula['hora_inicio'], 0, 5) . " às " . substr($conflitoAula['hora_fim'], 0, 5) . "."
        ];
    }

    // 2. Verificar conflitos na tabela de AGENDA_PROFESSORES (eventos manuais)
    // Como a agenda_professores usa turnos, precisamos mapear o horário solicitado para um turno
    // Ou verificar se o turno do evento coincide com o horário.
    
    // Mapeamento aproximado de horários para turnos para checagem cruzada
    $turno_solicitado = '';
    $h = (int)substr($hora_inicio, 0, 2);
    if ($h < 12) $turno_solicitado = 'Manhã';
    elseif ($h < 18) $turno_solicitado = 'Tarde';
    else $turno_solicitado = 'Noite';

    $sqlEventos = "SELECT ap.id, ap.tipo, ap.observacao, ap.turno, c.nome as curso_nome
                   FROM agenda_professores ap
                   LEFT JOIN cursos c ON ap.curso_id = c.id
                   WHERE ap.professor_id = :prof_id 
                     AND ap.data = :data
                     AND ap.turno = :turno
                     AND ap.tipo NOT IN ('FOLGA')"; // Folga não gera conflito impeditivo de aula, teoricamente
    
    if ($evento_id_ignorar) {
        $sqlEventos .= " AND ap.id <> :evento_id";
    }

    $stmtEventos = $conexao->prepare($sqlEventos);
    $paramsEventos = [':prof_id' => $professor_id, ':data' => $data, ':turno' => $turno_solicitado];
    if ($evento_id_ignorar) $paramsEventos[':evento_id'] = $evento_id_ignorar;

    $stmtEventos->execute($paramsEventos);
    $conflitoEvento = $stmtEventos->fetch(PDO::FETCH_ASSOC);

    if ($conflitoEvento) {
        $desc = "O professor possui um evento marcado como '{$conflitoEvento['tipo']}' no turno da {$conflitoEvento['turno']}";
        if ($conflitoEvento['curso_nome']) $desc .= " para o curso '{$conflitoEvento['curso_nome']}'";
        if ($conflitoEvento['observacao']) $desc .= " ({$conflitoEvento['observacao']})";
        $desc .= ".";
        
        return [
            'disponivel' => false,
            'conflito' => $desc
        ];
    }

    return ['disponivel' => true];
}
